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
            'admin' => $this->isAdmin(),
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
}
