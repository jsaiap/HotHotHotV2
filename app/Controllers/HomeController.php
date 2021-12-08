<?php

final class HomeController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public static function defautAction()
    {
        View::show('home/home');
    }
    
}