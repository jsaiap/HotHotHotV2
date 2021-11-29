<?php

// Rappel : nous sommes dans le répertoire Core, voilà pourquoi dans realpath je "remonte d'un cran" pour faire référence
// à la VRAIE racine de mon application

final class Constants
{
    // Les constantes relatives aux chemins

    const VIEWS_DIRECTORY        = '/Views/';

    const MODELS_DIRECTORY      = '/Models/';

    const CORE_DIRECTORY       = '/Core/';

    const EXCEPTIONS_DIRECTORY  = '/Core/Exceptions/';

    const CONTROLLERS_DIRECTORY = '/Controllers/';


    public static function rootDirectory() {
        return realpath(__DIR__ . '/../');
    }

    public static function coreDirectory(): string
    {
        return self::rootDirectory() . self::CORE_DIRECTORY;
    }

    public static function exceptionsDirectory(): string
    {
        return self::rootDirectory() . self::EXCEPTIONS_DIRECTORY;
    }

    public static function viewsDirectory(): string
    {
        return self::rootDirectory() . self::VIEWS_DIRECTORY;
    }

    public static function modelsDirectory(): string
    {
        return self::rootDirectory() . self::MODELS_DIRECTORY;
    }

    public static function controllersDirectory(): string
    {
        return self::rootDirectory() . self::CONTROLLERS_DIRECTORY;
    }


}