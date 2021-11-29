<?php
// Ce fichier est le point d'entrée de votre application

    require 'Core/AutoLoad.php';
    
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $postParams = isset($_POST) ? $_POST : null;

    View::openBuffer(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans

    try
    {
        $O_controleur = new Controller($url, $postParams);
        $O_controleur->run();
    }
    catch (ControleurException $O_exception)
    {
        echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
    }

    // Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
    ob_get_flush();