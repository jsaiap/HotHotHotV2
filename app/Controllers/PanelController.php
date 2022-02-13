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
        $sensor = new Sensor();
        // Creation des capteurs de base si il n'existe pas dans la table (Obligation de faire ça car le websocket ne fonctionne pas tout le temp)
        $sensors = $sensor->getAll();

        View::show('panel/page/sensor', array(
            "sensors" => $sensors
        ));
    }
    public function parameterAction()
    {   
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
        $url = $_SERVER['REQUEST_URI'];
        $url_components = parse_url($url);
        if(isset($url_components['query']) && !empty($url_components['query'])){
            parse_str($url_components['query'], $params);
        }

        if($_SESSION['user']->admin == 1){
            if(isset($params['id'])){
                $documentation = new Documentation($params['id']);
                View::show('panel/page/documentation_detail', array(
                    "documentation" => $documentation,
                ));
                return;
            }
            $documentation = new Documentation();
            $documentations = $documentation->getAll();
            View::show('panel/page/documentation', array(
                "documentations" => $documentations,
            ));
            return;
        }
        header('Location: /panel');
    }

    public function newDocAction(){
        if($_SESSION['user']->admin == 1){
            View::show('panel/page/documentation_create');
            return;
        }
        header('Location: /panel');
    }

}