<?php

    require_once('db.php');
    class airport extends db{

        function checkAirport($AirportId,$AirportCode,$AirportName){

            $sql = "CALL `sp_checkAirport`({$AirportId}, '{$AirportCode}' , '{$AirportName}')";
            return $this->getData($sql)->rowCount();
        }


        function saveAirport($AirportId,$AirportCode,$AirportName,$CityId){

            if($this->checkAirport($AirportId,$AirportCode,$AirportName)){

                return ["status" => "exists", "message" => $AirportName." already exists!"];

            } else {

            $sql = "CALL `sp_saveAirport`({$AirportId},'{$AirportCode}','{$AirportName}',{$CityId})";
            $this->getData($sql);
            return ["status" => "success", "message" => $AirportName . " has been saved successfully"];

            }
        }

        function getAirport(){

            $sql = "CALL `sp_getAirport`()";
            return $this->getJSON($sql);

        }

        function filterAirport($CityName, $AirportName,$CountryName,$AirportCode){

            $sql = "CALL `sp_filterAirport`('{$CityName}', '{$AirportName}','{$CountryName}','{$AirportCode}')";
            return $this->getJSON($sql);

        }

        function deleteAirport($AirportId){

            $sql = "CALL `sp_deleteAirport`({$AirportId})";
            $this->getData($sql);
            return ["status" => "success", "message" => "Airport has been deleted successfully"];


        }
    }



?>