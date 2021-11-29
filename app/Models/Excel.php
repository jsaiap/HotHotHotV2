<?php

final class Excel
{

        
    /**
     * Analyse le fichier et renvoie la liste des éleves
     *
     * @param  string $path
     * @return array
     */
    public function parseExcel(string $path)
    {  

        $handle = fopen($path , "r");
        $list = [];
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $list[] = $data;
        }

        $students = [];
        foreach($list as $row){
            $students[]=  explode(';',$row[0]);
        }
        array_splice($students,0,3);

        $tab = [];
        $i = 0;
        foreach($students as $student){
            $tab[$i]['civilite'] = $student[0];
            $tab[$i]['nom'] = $student[1];
            $tab[$i]['prenom'] = $student[2];
            $i++;
        }
        return $tab;
    }

    /**
     * Divise le tableau passé en paramètre selon la taille donner 
     *
     * @param  array $tab
     * @param  int $length
     * @return array
     */
    public function chunckTab($tab,$length)
    {
        return array_chunk($tab,$length);
    }

}