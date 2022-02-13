<?php

final class SettingController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public function defautAction()
    {
        header('Location: /panel/parameter');
    }

    public function updateAction(){
        if(isset($_POST['name']) && !empty($_POST['name'])){
            if($_SESSION['setting']->{$_POST['name']} == 0){
                $_SESSION['setting']->{$_POST['name']} = 1 ;
            }
            else {
                $_SESSION['setting']->{$_POST['name']} = 0;
            }
            $_SESSION['setting']->save();
        }
        $_SESSION['setting']->refresh();
        header('Location: /panel/parameter');
    }
}