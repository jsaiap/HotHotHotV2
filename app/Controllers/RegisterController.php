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
                    return ;
                }
                elseif($_POST['password'] == $_POST['password-confirm']){
                    $_SESSION['user']->username = $_POST['username'] ;
                    $_SESSION['user']->name = $_POST['name'] ;
                    $_SESSION['user']->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $_SESSION['user']->email = $_POST['email'];
                    $_SESSION['user']->save();
                    $_SESSION['setting'] = new Setting($_SESSION['user']->id);
                    header('Location: /panel');
                    return ;
                }
        }
        header('Location: /home');
        return ;
    }
    
}