<?php

    require_once 'db.php';

    class airline extends db{

        function checkAirline($AirlineId,$AirlineName,$AirlineCode){

            $sql = "CALL `sp_checkAirline`({$AirlineId},'{$AirlineName}','{$AirlineCode}')";
            return $this->getData($sql)->rowCount();
        }

        function saveAirline($AirlineId,$AirlineName,$AirlineLogo,$CountryId,$AirlineCode){
            if($this->checkAirline($AirlineId,$AirlineName,$AirlineCode)){

                return ["status" => "exists", "message" => $AirlineName. " aready exists"];

            }else{

                $sql = "CALL `sp_saveAirline`({$AirlineId},'{$AirlineName}','{$AirlineLogo}',{$CountryId},'{$AirlineCode}')";
                $this->getData($sql);
                return ["status" => "success", "message" => $AirlineName. " has been saved successfully"];

            }
        }

        function filterAirline($AirlineName,$CountryName,$AirlineCode){

            $sql = "CALL `sp_filterAirline`('{$AirlineName}','{$CountryName}','{$AirlineCode}')";
            return $this->getJSON($sql);

        }

        function getAirline(){

            $sql = "CALL `sp_getAirline`()";
            return $this->getJSON($sql);

        }

        function deleteAirline($AirlineId){

            $sql = "Call `sp_deleteAirline`({$AirlineId})";
            $this->getData($sql);

            return ["status" => "success", "message"=> "Airline has been deleted successfully"];

        }
    }


?>