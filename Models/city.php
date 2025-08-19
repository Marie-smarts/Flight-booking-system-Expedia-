<?php

    require_once("db.php");

    class city extends db{

        function checkCity($CityId,$CityName){
            $sql ="CALL `sp_checkCity`('{$CityName}',{$CityId})";
            return $this->getData($sql)->rowCount(); 
        }
    

        function saveCity($CityId,$CityName,$CountryId){

            if($this-> checkCity($CityId,$CityName)){

                //Check to see if the city already exists.
                //If the city exists it will display this message
                return ["status" => "exists", "message" => "City ".$CityName." already exists!"];


            }else{

                //If the city doesn't exist then this will run
                // and the message will be returned

                $sql = "CALL  `sp_saveCity`({$CityId},'{$CityName}',{$CountryId})";
                $this->getData($sql);
                return ["status" => "success", "message" => "City ". $CityName . " has been saved successfully"];

            }

        }

        function getCity(){

            $sql = "CALL  `sp_getCity`()";
            return $this->getJSON($sql);

        }

        function filterCity($CountryName,$CityName){

            $sql = "CALL `sp_filterCities`('{$CountryName}' , '{$CityName}')";
            return $this->getJson($sql);

        }

        function deleteCity($CityId){

            $sql = "CALL `sp_deleteCity`({$CityId})";
            $this->getData($sql);
            return ["status" => "success", "message" => "City has been deleted"];


        }
    }

?>