<?php

final class DocumentationController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public function defautAction()
    {
        header('Location: /panel/account');
    }

    public function updateAction(){
        if($_SESSION['user']->admin == 1){
            if(isset($_POST['id']) && !empty($_POST['id'])){
                $doc = new Documentation($_POST['id']);
                $doc->title = $_POST['title'];
                $doc->text = $_POST['text'];
                $doc->save();
            }
        }
        header('Location: /panel/documentation?id='.$_POST['id']);
    }

    public function deleteAction(){
        if($_SESSION['user']->admin == 1){
            $url = $_SERVER['REQUEST_URI'];
            $url_components = parse_url($url);
            parse_str($url_components['query'], $params);
            if(isset($params['id']) && !empty($params['id'])){
                $user = new User($params['id']);
                $user->delete();
            }
        }
        header('Location: /panel/documentation');       
    }

    public function createAction(){
        if($_SESSION['user']->admin == 1 && (isset($_POST['title']) && !empty($_POST['title'])) && (isset($_POST['text']) && !empty($_POST['text']))){
            $documentation = new Documentation();
            $documentation->title = $_POST['title'];
            $documentation->text = $_POST['text'];
            $documentation->save();
        }
        header('Location: /panel/documentation');
    }
}