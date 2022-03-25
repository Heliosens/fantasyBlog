<?php


class FormController extends Controller
{
    /**
     * display register or connection
     * @param $param
     */
    public function displayForm ($param){
        $this->render($param);
    }

    /**
     * verify register data
     */
    public function checkRegisterForm (){
        if(isset($_POST['button'])){
            $result = [];
            $pseudo = $this->cleanEntries('pseudo');
            $mail = $this->cleanEntries('email');
            $password = $_POST['password'];
            $passwordBis = $_POST['password-bis'];

            $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $result[] = "L'adresse email n'est pas valide";
            }

            if(strlen($pseudo) < 2 ) {
                $result[] = "Le pseudo n'est pas assez long";
            }

            if($password !== $passwordBis){
                $result[] = "Les mots de passe ne sont pas identiques";
            }

            if(!preg_match('/^(?=.*[!+@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                // Le password ne correspond pas au critère.
                $result[] = "Le password ne correpsond pas au critère";
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
                    $_SESSION['error'] = "cet email existe déjà";
                }
                else {
                    UserManager::addUser($user);
                    if($user->getId() !== null){
                        $_SESSION['success'] = "Votre compte a bien été créé";
                        $_SESSION['error'] = [];
                        $_SESSION['user'] = $user->getPseudo();
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['roles'] = $user->getRoles();
                    }
                    else {
                        $_SESSION['error'] = "Une erreur s'est produite";
                    }
                }
            }
            header('Location: index.php');
        }
    }

    /**
     * verify password
     */
    public function checkConnectionForm (){
        if(isset($_POST['button'], $_POST['email'], $_POST['password'])){
            $mail = $this->cleanEntries('email');
            $password = $_POST['password'];

            $user = UserManager::getUserByMail($mail);
            if($user === null){
                $_SESSION['error'] = "Email et/ou mot de passe incorrect";
            }
            else{
                if(password_verify($password, $user->getPassword())){
                    $_SESSION['user'] = $user->getPseudo();
                    $_SESSION['id'] = $user->getId();
                    foreach ($user->getRoles() as $role){
                        $roleName = $role->getRoleName();
                        $_SESSION['roles'][] = $roleName;
                    }
                }
            }
        }
        header('Location: index.php');
    }
}