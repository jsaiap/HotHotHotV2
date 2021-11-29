<?php

final class HomeController
{
        
    /**
     * Action par defaut à executer à la racine 
     *
     * @return void
     */
    public function defautAction()
    {
        View::show('home/home');
    }
    
    /**
     * Action pour envoyer le fichier à traiter
     *
     * @return void
     */
    public function postAction()
    {
        $excel =  new Excel();
        $tab = [];
        if (isset($_FILES['excel']) && !empty($_FILES['excel']) && pathinfo($_FILES['excel']['name'],PATHINFO_EXTENSION) == 'csv'){
            $tab = $excel->parseExcel($_FILES['excel']['tmp_name']);
            View::show('excel/liste', array('excel'=> $tab, 'test'=> $excel->chunckTab($tab,4)));
        }
        else{
            View::show('excel/form');
        }
    }
    
    /**
     * Action pour générer la liste des groupes
     *
     * @return void
     */
    public function generateAction(){
        session_start();
        $excel =  new Excel();
        if (isset($_POST['chunck']) && !empty($_POST['chunck'])){
            $list = $_SESSION['list'];
            $shuffle = $_SESSION['list'];
            $lenght = $_POST['chunck'];
            shuffle($shuffle);
            $chunckList = $excel->chunckTab($shuffle,$lenght);
            View::show('excel/liste', array('excel'=> $list, 'group'=> $chunckList));
        }
    }
}