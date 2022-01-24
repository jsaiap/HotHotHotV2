<?php

final class LogoutController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public function defautAction()
    {
        session_destroy();
        header("Location: http://".$_SERVER['HTTP_HOST']."/home");

    }
    
}