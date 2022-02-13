<?php

final class AccountController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public function defautAction()
    {
        header('Location: /panel/account');
    }

    public function editAction(){
        if($_SESSION['user']->google != 1 && count(array_filter($_POST))==count($_POST)){
            if(!$_SESSION['user']->isObjectExistBy("email",$_POST['email'])){
                $_SESSION['user']->email = $_POST['email'];
            }
            if(!$_SESSION['user']->isObjectExistBy("username",$_POST['username'])){
                $_SESSION['user']->username = $_POST['username'];
            }
            if (password_verify($_POST['pwd'], $_SESSION['user']->password) && $_POST['new-pwd'] == $_POST['conf-new-pwd']){
                $_SESSION['user']->password = password_hash($_POST['new-pwd'], PASSWORD_DEFAULT);
            }
        }
        $_SESSION['user']->name = $_POST['name'];
        $_SESSION['user']->save();
        $_SESSION['user']->refresh();
        header('Location: /panel/account');
    }
}