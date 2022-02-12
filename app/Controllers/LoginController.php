<?php

final class LoginController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public function defautAction()
    {
        if(count(array_filter($_POST))==count($_POST)){
            $_SESSION['user'] = new User();
            if($_SESSION['user']->isObjectExistBy("username", $_POST['username'])){
                $testUser = $_SESSION['user']->getObjectBy("username", $_POST['username']);
                if($_POST['username'] == $testUser["username"] && hash("md5",$_POST['password']) == $testUser['password']){
                    $_SESSION['user'] = new User($testUser['id']);
                    $_SESSION['setting'] = new Setting($_SESSION['user']->id);
                    header('Location: /panel'); 
                    return;
                }
            }
        }
        header('Location: /home');
        return;
    }

    public function googleAction(){
        if(count(array_filter($_POST))==count($_POST)){
            $_SESSION['user'] = new User();
            if($_SESSION['user']->isObjectExistBy("email", $_POST['email'])){
                $testUser = $_SESSION['user']->getObjectBy("email", $_POST['email']);
                $_SESSION['user'] = new User($testUser['id']);
                $_SESSION['setting'] = new Setting($_SESSION['user']->id);
                header('Location: /panel'); 
                return;
            }
            else{
                $_SESSION['user']->name =  $_POST['name'];
                $_SESSION['user']->email =  $_POST['email'];
                $_SESSION['user']->picture =  $_POST['picture'];
                $_SESSION['user']->google = 1 ;
                $_SESSION['user']->save();
                $_SESSION['setting'] = new Setting($_SESSION['user']->id);
                header('Location: /panel'); 
                return;
            }
        }
        header('Location: /home');
        return;
    }
}