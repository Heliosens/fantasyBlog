<?php


class UserController extends Controller
{
    /**
     * show user data
     * @param $id
     */
    public function displayProfile(){
        $data = ['user' => UserManager::getUserById($_SESSION['id'])];
        $this->render('profile', $data);
    }

    public function newUser(){

    }
}
