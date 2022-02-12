<?php

final class PanelController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public static function defautAction()
    {
        View::show('panel/page/sensor');
    }
    public function parameterAction()
    {

        $_SESSION['settings'] = new Setting();
        View::show('panel/page/parameter');
    }
    public function accountAction()
    {
        View::show('panel/page/account');
    }
    public function resumeAction()
    {
        View::show('panel/page/sensor-resume');
    }

    public function usersAction(){
        if($_SESSION['user']->admin == 1){
            $users = new User();
            $users = $users->getAll();
            View::show('panel/page/users', array(
                "users" => $users,
            ));
            return;
        }
        header('Location: /panel');
    }

    public function documentationAction(){
      
        if($_SESSION['user']->admin == 1){
            View::show('panel/page/documentation');
            return;
        }
        header('Location: /panel');
    }

}