<?php

final class ForgotPasswordController
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
            if($_SESSION['user']->isObjectExistBy("email", $_POST['email'])){
                $testUser = $_SESSION['user']->getObjectBy("email", $_POST['email']);
                $_SESSION['user'] = new User($testUser['id']);
                date_default_timezone_set('Europe/Paris');
                $token = uniqid();
                while($_SESSION['user']->isObjectExistBy('token', $token)) {
                    $token = uniqid();
                }
                $date = strtotime(date("Y-m-d H:i:s"));
                $futureDate = $date+(60*5);
                $_SESSION['user']->token_date = date("Y-m-d H:i:s", $futureDate);
                $_SESSION['user']->token = $token;
                $_SESSION['user']->save();
                var_dump($_SESSION['user']->token_date);
                var_dump(date("Y-m-d H:i:s"));
                mail($_POST['email'], 'Mot de passe oublié', 'Pour rénitialiser votre mot de passe cliquez sur le lien\n\n
                https://ec2-15-237-149-228.eu-west-3.compute.amazonaws.com/reset?email='.$_POST['email'].'&token='.$token);
            }
        }
        header('Location: /home');
        return;
    }

    public function resetAction()
    {
        $_SESSION['user'] = new User();
        if($_SESSION['email']->isObjectExistBy("email", $_GET['email'])){
            date_default_timezone_set('Europe/Paris');
            if($_SESSION['user']->token_date > date("Y-m-d H:i:s") && $_SESSION['user']->token == $_GET['token']) {
                $_SESSION['user']->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_SESSION['user']->save();
            }
        }
        header('Location: /home');
        return;
    }
    
}

