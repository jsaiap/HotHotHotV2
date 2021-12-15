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
}