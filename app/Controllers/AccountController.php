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
            if ($_SESSION['user']->password == hash("md5", $_POST['pwd']) && $_POST['new-pwd'] == $_POST['conf-new-pwd']){
                $_SESSION['user']->password = hash("md5",$_POST['new-pwd']);
            }
        }
        $_SESSION['user']->name = $_POST['name'];
        $_SESSION['user']->save();
        header('Location: /panel/account');
    }
}