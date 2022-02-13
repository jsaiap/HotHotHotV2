<?php
    require_once('../../Core/DataBase.php');
    require_once('../../Core/ObjectModel.php');
    require_once('../../Models/Sensor.php');
    require_once('../../Models/SensorData.php');

    ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-GB; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3');
    $datas = file_get_contents('http://hothothot.dog/api/capteurs/');
    header('Content-Type: Application/json');
    $datas = json_decode($datas)->capteurs;
    $sensor = new Sensor();
    // Si on obtien les données
    if(isset($datas) && !empty($datas)){
        if(!$sensor->isObjectExistBy('id', 1) || !$sensor->isObjectExistBy('id', 2)){
            foreach($datas as $data){
                $tempSensor = new Sensor();
                $tempSensor->name = ucfirst($data["Nom"]);
                $tempSensor->type =  strtolower($data["Type"]);
                $tempSensor->current_temperature = $data["Valeur"] ;
                $tempSensor->save();

                $tempSensorData = new SensorData();
                $tempSensorData->sensor_id = $tempSensor->id;
                $tempSensorData->temperature = $data["Valeur"];
                $tempSensorData->save();
            }
        }
        else{
            $i = 0;
            foreach($datas as $data){
                $i = $i + 1;
                $tempSensor = new Sensor($i);
                $tempSensor->current_temperature = $data["Valeur"];
                $tempSensor->save();

                $tempSensorData = new SensorData();
                $tempSensorData->sensor_id = $tempSensor->id;
                $tempSensorData->temperature = $data["Valeur"];
                $tempSensorData->save();
            }
        }
    }
    //Sinon on génère des données aléatoire
    else{
        if(!$sensor->isObjectExistBy('id', 1) || !$sensor->isObjectExistBy('id', 2)){
            $rand1 = rand(-10,70);
            $tempSensor = new Sensor();
            $tempSensor->name = "Interieur";
            $tempSensor->type =  "thermique";
            $tempSensor->current_temperature = $rand1 ;
            $tempSensor->save();
                
            $tempSensorData = new SensorData();
            $tempSensorData->sensor_id = 1;
            $tempSensorData->temperature = $rand1;
            $tempSensorData->save();

            $rand2 = rand(-10,70);
            $tempSensor2 = new Sensor();
            $tempSensor2->name = "Exterieur";
            $tempSensor2->type =  "thermique";
            $tempSensor2->current_temperature = $rand2 ;
            $tempSensor2->save();

            $tempSensorData2 = new SensorData();
            $tempSensorData2->sensor_id = 2;
            $tempSensorData2->temperature = $rand2;
            $tempSensorData2->save();
        }
        else{
            $rand1 = rand(-10,70);
            $tempSensor = new Sensor(1);
            $tempSensor->current_temperature =  $rand1 ;
            $tempSensor->save();
            
            $tempSensorData = new SensorData();
            $tempSensorData->sensor_id = 1;
            $tempSensorData->temperature = $rand1;
            $tempSensorData->save();
            
            $rand2 = rand(-10,70) ;
            $tempSensor2 = new Sensor(2);
            $tempSensor2->current_temperature = $rand2;
            $tempSensor2->save();

            $tempSensorData2 = new SensorData();
            $tempSensorData2->sensor_id = 2;
            $tempSensorData2->temperature = $rand2;
            $tempSensorData2->save();
        }
    }

?>