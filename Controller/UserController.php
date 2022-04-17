<?php


class UserController extends Controller
{
    /**
     * show user data
     * @param $id
     */
    public function displayProfile($id){
        $data = [
            'user' => UserManager::getUserById($id),
            'artId' => ArticleManager::getArtList($id),
            'comm' => CommentManager::commentByUser($id)
        ];
        $this->render('profile', $data);
    }

    /**
     */
    public function displayList(){
        $data = [
            'type' => 'utilisateurs',
            'user' => UserManager::getAllUser()
        ];
        $this->render('list', $data);
    }

    /**
     * @param $id
     */
    public function delUser($id)
    {
        if(UserManager::deleteUserById($id)){
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }

    /**
     * @param $id
     */
    public function adminToUser ($id){
        if(UserManager::getAdmin()["count(*)"] >= 2 ){
            RolesManager::delAdminRole($id);
        }
        else{
            $_SESSION['error'] = "impossible de supprimer l'administrateur";
        }
        var_dump($_SESSION);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    /**
     * @param $id
     */
    public function userToAdmin ($id){
        if (RolesManager::addAdminRole($id)){
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }

}
