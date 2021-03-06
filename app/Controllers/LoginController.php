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
        $error = "";
        if(count(array_filter($_POST))==count($_POST)){
            date_default_timezone_set('Europe/Paris');
            $_SESSION['user'] = new User();
            if($_SESSION['user']->isObjectExistBy("username", $_POST['username'])){
                $testUser = $_SESSION['user']->getObjectBy("username", $_POST['username']);
                if($_POST['username'] == $testUser["username"] && password_verify($_POST['password'], $testUser['password']) && $testUser['locked'] == 0){
                    $_SESSION['user'] = new User($testUser['id']);
                    $_SESSION['user']->last_connexion=$_SESSION['user']->now_connexion;
                    $_SESSION['user']->now_connexion=date("Y-m-d H:i:s");
                    $_SESSION['user']->connexion_number+=1;
                    $_SESSION['user']->connexion_fail=1;
                    $_SESSION['user']->save();
                    var_dump($_SESSION['user']);
                    $_SESSION['setting'] = new Setting($_SESSION['user']->id);
                    header('Location: /panel'); 
                    return;
                } else {
                    $_SESSION['user'] = new User($testUser['id']);
                    $error = "Identifiant ou mot de passe incorrect";
                    // Regarde si l'utilisateur n'a pas son compte bloqué
                    if($testUser['locked'] == 0) {
                        switch($testUser['connexion_fail']) {
                            case 1:
                                $_SESSION['user']->connexion_fail=2;
                                break;
                            case 2:
                                $_SESSION['user']->connexion_fail=3;
                                break;
                            case 3:
                                $_SESSION['user']->connexion_fail=4;
                                $_SESSION['user']->locked=1;
                                $error  = "Utilisateur bloqué";
                                break;
                        }
                        $_SESSION['user']->save();
                    }
                }
            }
        }
        View::show('home/connect', array(
            "error" => $error
        ));
        return;
    }
    
    public function googleAction(){
        if(count(array_filter($_POST))==count($_POST)){

            $_SESSION['user'] = new User();
            if($_SESSION['user']->isObjectExistBy("email", $_POST['email'])){
                $testUser = $_SESSION['user']->getObjectBy("email", $_POST['email']);
                $_SESSION['user'] = new User($testUser['id']);
                $_SESSION['user']->last_connexion=$_SESSION['user']->now_connexion;
                $_SESSION['user']->now_connexion=date("Y-m-d H:i:s");
                $_SESSION['user']->connexion_number+=1;
                $_SESSION['user']->save();
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