<?php


class FormController extends Controller
{
    public function cleanEntries ($param){
        return trim(strip_tags($_POST[$param]));
    }

    /**
     * @param $param
     */
    public function displayForm ($param){
                $this->render($param);
    }

    public function checkUserForm (){

        if(isset($_POST['button'])){
            $result = [];
            $pseudo = $this->cleanEntries('pseudo');
            $mail = $this->cleanEntries('email');
            $password = $_POST['password'];
            $passwordBis = $_POST['password-bis'];

            $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $result[] = ["error" => "L'adresse email n'est pas valide"];
            }

            if(strlen($pseudo) < 2 ) {
                $result[] = ["error" => "Le pseudo n'est pas assez long"];
            }

            if($password !== $passwordBis){
                $result[] = ["error" => "Les mots de passe ne sont pas identiques"];
            }

            if(!preg_match('/^(?=.*[!@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                // Le password ne correspond pas au critère.
                $result[] = ["error" => "Le password ne correpsond pas au critère"];
            }

            if(count($result) > 0){
                $_SESSION['error'] = $result;
            }
            else {
                $user = new User();
                $role = RolesManager::getRole('user');
                $user->setPseudo($pseudo)
                    ->setEmail($mail)
                    ->setPassword(password_hash($password, PASSWORD_DEFAULT))
                    ->setRoles([$role])
                    ;
                // check if mail existe
                if(UserManager::isAlreadyMail($mail)){
                    $_SESSION['error'] = ['error' => "cette email existe déjà"];
                }
                UserManager::addUser($user);
                if($user->getId() !== null){
                    $_SESSION['success'] = "Votre compte a bien été créé";
                    $_SESSION['error'] = [];
                    $_SESSION['user'] = $user->getPseudo();
                }
                else {
                    $_SESSION['error'] = ['error' => "Une erreur s'est produite"];
                }
            }
        }
        header('Location: index.php');
    }
}