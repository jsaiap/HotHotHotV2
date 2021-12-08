<?php

final class View
{
    public static function openBuffer()
    {
        // On démarre le tampon de sortie, on va l'appeler "tampon principal"
        ob_start();
    }

    public static function getContentBuffer()
    {
        // On retourne le contenu du tampon principal
        return ob_get_clean();
    }

    public static function show ($location, $parameters = array())
    {

        $path = substr($location,0,strpos($location,'/'));
        $fichier = Constants::viewsDirectory() . $location . '.php';
        $template = Constants::viewsDirectory() . $path . '/template.php';

        $view = $parameters;
        // Démarrage d'un sous-tampon
        session_start();
        ob_start();
        include $fichier; // c'est dans ce fichier que sera utilisé A_vue, la vue est inclue dans le sous-tampon
        ob_end_flush();

        if(file_exists($template)){
            $view['body'] = self::getContentBuffer();
            ob_start();
            include $template; // c'est dans ce fichier que sera utilisé A_vue, la vue est inclue dans le sous-tampon
            ob_end_flush();
        }
    }

}