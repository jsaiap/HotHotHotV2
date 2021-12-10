<?php

final class RegisterController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public function defautAction()
    {
        if(count(array_filter($_POST))==count($_POST)){
                session_start();
                $_SESSION['user'] = new User();
                if($_SESSION['user']->isObjectExistBy("username", $_POST['username']) || $_SESSION['user']->isObjectExistBy("email", $_POST['email'])){
                    session_destroy();
                    header('Location: /home');
                }
                else{
                    $_SESSION['user']->username = $_POST['username'] ;
                    $_SESSION['user']->password = hash("md5",$_POST['password']);
                    $_SESSION['user']->email = $_POST['email'];
                    $_SESSION['user']->save();
                    header('Location: /panel');
                }
        }
        else{
            header('Location: /home');
        }
    }
    
}