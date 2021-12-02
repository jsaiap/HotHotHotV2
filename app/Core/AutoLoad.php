<?php

require 'Core/Constants.php';

final class AutoLoad
{
    public static function loadClassesCore ($className)
    {
        $file = Constants::coreDirectory() . "$className.php";
        return static::_load($file);
    }

    public static function loadClassesException ($className)
    {
        $file = Constants::exceptionsDirectory() . "$className.php";

        return static::_load($file);
    }

    public static function loadClassesModel ($className)
    {
        $file = Constants::modelsDirectory() . "$className.php";

        return static::_load($file);
    }


    public static function loadClassesView ($className)
    {
        $file = Constants::viewsDirectory() . "$className.php";

        return static::_load($file);
    }

    public static function loadClassesController ($className)
    {
        $file = Constants::controllersDirectory() . "$className.php";

        return static::_load($file);
    }

    // public static function loadModulesClassesModel ($className)
    // {
    //     foreach(glob(Constants::modelsDirectory() . '*', GLOB_ONLYDIR) as $modules){

    //         foreach(Constants::modulesModelsDirectory($modules) . "/$className.php")
    //             $file Constants::modulesModelsDirectory($modules) . "/$className.php"
    //             return static::_load($file);

    //     }

    // }

    // public static function loadModulesClassesView ($moduleName, $className)
    // {
    //     $file = Constants::modulesViewsDirectory($moduleName) . "$className.php";

    //     return static::_load($file);
    // }

    public static function loadModulesClassesController ($className)
    {
        $file = "";

        $dotDir = array('.', '..');

        // foreach(glob(Constants::modelsDirectory() . "*", GLOB_ONLYDIR) as $module){
        //     foreach(glob(Constants::modulesControllersDirectory("$module") . "*.php") as $controllerName){
        //         if ("$controllerName" == "$className.php"){
        //             $file = Constants::modulesControllersDirectory("$module") . "$className.php";
        //         }
        //     }
        // }

        foreach(array_diff(scandir(Constants::modulesDirectory(), 1), $dotDir) as $module){
            foreach(array_diff(scandir(Constants::modulesControllersDirectory("$module"), 1), $dotDir) as $controllerName){
                if ("$controllerName" == "$className.php"){
                    $file = Constants::modulesControllersDirectory("$module") . "$className.php";
                }
            }
        }

        // $file = Constants::modulesDirectory() . "Test/Controllers/$className.php";
        // $file = Constants::modulesControllersDirectory("Test") . "$className.php";

        return static::_load($file);
    }

    private static function _load ($S_fichierACharger)
    {
        if (is_readable($S_fichierACharger))
        {
            require $S_fichierACharger;
        }
    }
}

// J'empile tout ce beau monde comme j'ai toujours appris à le faire...
spl_autoload_register('AutoLoad::loadClassesCore');
spl_autoload_register('AutoLoad::loadClassesException');
spl_autoload_register('AutoLoad::loadClassesModel');
spl_autoload_register('AutoLoad::loadClassesView');
spl_autoload_register('AutoLoad::loadClassesController');
// spl_autoload_register('AutoLoad::loadModulesClassesModel');
// spl_autoload_register('AutoLoad::loadModulesClassesView');
spl_autoload_register('AutoLoad::loadModulesClassesController');


