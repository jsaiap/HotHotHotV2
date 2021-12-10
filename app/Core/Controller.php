<?php

final class Controller
{
    private $_url;

    private $_urlParams;

    private $_postParams;

    public function __construct ($S_url, $A_postParams)
    {
        // On élimine l'éventuel slash en fin d'URL sinon notre explode renverra une dernière entrée vide
        if ('/' == substr($S_url, -1, 1)) {
            $S_url = substr($S_url, 0, strlen($S_url) - 1);
        }
        // On éclate l'URL, elle va prendre place dans un tableau
        $url = explode('/', $S_url);
        if (empty($url[0])) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controller"
            $url[0] = 'HomeController';
        } else {
            $url[0] =  ucfirst($url[0]) . 'Controller' ;
        }

        if (empty($url[1])) {
            // L'action est vide ! On la valorise par défaut
            $url[1] = 'defautAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $url[1] = $url[1] . 'Action';
        }


        // on dépile 2 fois de suite depuis le début, c'est à dire qu'on enlève de notre tableau le contrôleur et l'action
        // il ne reste donc que les éventuels parametres (si nous en avons)...
        $this->_url['controleur'] = array_shift($url); // on recupere le contrôleur
        $this->_url['action']     = array_shift($url); // puis l'action

        // ...on stocke ces éventuels parametres dans la variable d'instance qui leur est réservée
        $this->_urlParams = $url;

        // On  s'occupe du tableau $A_postParams
        $this->_postParams = $A_postParams;


    }

    // On exécute notre triplet

    public function run()
    {
        if (!class_exists($this->_url['controleur'])) {
            throw new ControleurException($this->_url['controleur'] . " n'est pas un controleur valide.");
        }

        if (!method_exists($this->_url['controleur'], $this->_url['action'])) {
            throw new ControleurException($this->_url['action'] . " du contrôleur " .
                $this->_url['controleur'] . " n'est pas une action valide.");
        }

        $B_called = call_user_func_array(array(new $this->_url['controleur'],
            $this->_url['action']), array($this->_urlParams, $this->_postParams ));

        if (false === $B_called) {
            throw new ControleurException("L'action " . $this->_url['action'] .
                " du contrôleur " . $this->_url['controleur'] . " a rencontré une erreur.");
        }
    }
}