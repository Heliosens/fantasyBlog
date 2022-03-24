<?php


class UserController extends Controller
{
    /**
     * show user data
     */
    public function displayProfile(){
        $data = ['user' => UserManager::getUserById($_SESSION['id']), 'admin' => $this->isAdmin()];
        $this->render('profile', $data);
    }

}
