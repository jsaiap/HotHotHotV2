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
                $token = uniqid();
                while($_SESSION['user']->isObjectExistBy('token', $token)) {
                    $token = uniqid();
                }
                $_SESSION['user']->token_date = date("Y-m-d H:i+5:s");
                $_SESSION['user']->token = $token;
                $_SESSION['user']->save();
                mail($_POST['email'], 'Mot de passe oublié', 'Pour rénitialiser votre mot de passe cliquez sur le lien\n\n
                http://ec2-15-237-149-228.eu-west-3.compute.amazonaws.com/reset?id='.$_SESSION['user'].'&token='.$token);
            }
        }
        header('Location: /home');
        return;
    }

    public function resetAction()
    {
        $_SESSION['user'] = new User();
        if($_SESSION['id']->isObjectExistBy("id", $_GET['id'])){
            if($_SESSION['user']->token_date > date("Y-m-d H:i:s") && $_SESSION['user']->token == $_GET['token']) {
                $_SESSION['user']->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_SESSION['user']->save();
            }
        }
        header('Location: /home');
        return;
    }
    
}

