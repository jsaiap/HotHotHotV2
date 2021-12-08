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
        if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['username'])){
            if ($_POST['username'] == "test" && $_POST['password'] == "test"){
                session_start();
                $_SESSION['username'] = "test";
                header('Location: /panel');
            }
            else{
                header('Location: /home');
            }
         
        }
        else{
            header('Location: /home');
        }
    }
    
}