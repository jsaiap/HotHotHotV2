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
            session_start();
            $_SESSION['user'] = new User();
            if($_SESSION['user']->isObjectExistBy("username", $_POST['username'])){
                $testUser = $_SESSION['user']->getObjectBy("username", $_POST['username']);
                if($_POST['username'] == $testUser["username"] && hash("md5",$_POST['password']) == $testUser['password']){
                    $_SESSION['user'] = new User($testUser['id']);
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
            session_start();
            $_SESSION['user'] = new User();
            if($_SESSION['user']->isObjectExistBy("username", $_POST['username'])){
                $testUser = $_SESSION['user']->getObjectBy("username", $_POST['username']);
                if($_POST['username'] == $testUser["username"] && hash("md5",$_POST['password']) == $testUser['password']){
                    $_SESSION['user'] = new User($testUser['id']);
                    header('Location: /panel'); 
                    return;
                }
            }
        }
        header('Location: /home');
        return;
    }
}