<?php

final class UserController
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

    public function updateAction(){
        if($_SESSION['user']->admin == 1){
            if(isset($_POST['id']) && !empty($_POST['id'])){
                $user = new User($_POST['id']);
                foreach($_POST as  $key => $value){
                    if(isset($user->{$key})){
                        $user->{$key} = $value;
                    }
                }
                $user->save();
            }
            $_SESSION['user']->refresh();
        }
        header('Location: /panel/users');
    }

    public function deleteAction(){
        if($_SESSION['user']->admin == 1){
            $url = $_SERVER['REQUEST_URI'];
            $url_components = parse_url($url);
            parse_str($url_components['query'], $params);
            if(isset($params['id']) && !empty($params['id'])){
                $user = new User($params['id']);
                $user->delete();
            }
        }
        header('Location: /panel/users');       
    }

    public function createAction(){
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