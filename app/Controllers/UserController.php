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
                        if (is_numeric($value)){
                            $val = intval($value);
                            $user->{$key} = $val;
                        }
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
}