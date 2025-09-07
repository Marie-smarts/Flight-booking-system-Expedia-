<?php

    require_once ("db.php");

    class flightsupply extends db{

        function checkFlightSupply($FlightId,$FlightNo){

            $sql = "CALL `sp_checkFlightSupply`({$FlightId},'{$FlightNo}')";
            return $this->getData($sql)->rowCount();

        }

        function saveFlightSupply($FlightId,$FlightNo,$AirlineId,$DepartureTime,$DepartureCityId,$ArrivalTime,$DestinationCityId){

            if($this->checkFlightSupply($FlightId,$FlightNo)){

                return ["status"=>"exists", "message"=>"Flight Supply already exists"];

            }else{

                $sql = "CALL `sp_saveFlightSupply`({$FlightId},'{$FlightNo}',{$AirlineId},'{$DepartureTime}',{$DepartureCityId},'{$ArrivalTime}',{$DestinationCityId})";
                $this->getData($sql);
                return ["status"=>"success", "message"=>"Flight Supply saved successfully"];

            }
        }


        function getFlightSupply(){

            $sql = "CALL `sp_getFlightSupply`()";
            return $this->getJSON($sql);

        }


        function filterFlightSupply($FlightNo, $AirlineName, $DepartureCity, $DestinationCity){

            $sql = "CALL `sp_filterFlightSupply`('{$FlightNo}', '{$AirlineName}', '{$DepartureCity}', '{$DestinationCity}')";
            return $this->getJSON($sql);

        }


        function deleteFlightSupply($FlightId){

            $sql = "CALL `sp_deleteFlightSupply`({$FlightId})";
            $this->getData($sql);
            return ["status"=>"success", "message"=>"Flight Supply deleted successfully"];
        }
    }


?>