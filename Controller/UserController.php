<?php


class UserController extends Controller
{
    /**
     * show user data
     */
    public function displayProfile(){
        $data = [
            'user' => UserManager::getUserById($_SESSION['id']),
            'admin' => $this->isAdmin(),
            'artId' => ArticleManager::getArtList($_SESSION['id']),
            'comm' => CommentManager::commentByUser($_SESSION['id'])
        ];
        $this->render('profile', $data);
    }

    /**
    * @param $option
    */
    public function displayList($option){
        $data = [];
        switch ($option){
            case 'user':
            $data[] = [
                'type' => 'utilisateurs',
            ];

            break;
            case 'article':
            $data[] = [
                'type' => 'articles',
            ];

            break;
        }

        $this->render('list', $data);
    }

}
