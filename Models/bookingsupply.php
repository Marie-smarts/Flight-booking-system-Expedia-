<?php

    require_once("db.php");

    class bookingsupply extends db{

        function checkBookingSupply($BookingSupplyId){

            $sql = "CALL `sp_checkBookingSupply`({$BookingSupplyId})";
            return $this->getData($sql)->rowCount();

        }

        function saveBookingSupply($BookingSupplyId,$FlightId,$BookingClassId,$NoOfSeats,$Price,$CurrencyId){

            if($this->checkBookingSupply($BookingSupplyId)){

                return ["status"=>"exists", "message"=>"Booking Supply already exists"];

            }else{

                $sql = "CALL `sp_saveBookingSupply`({$BookingSupplyId},{$FlightId},{$BookingClassId},{$NoOfSeats},'{$Price}',{$CurrencyId})";
                $this->getData($sql);
                return ["status"=>"success", "message"=>"Booking Supply saved successfully"];

            }
        }

        function getBookingSupply(){

            $sql = "CALL `sp_getBookingSupply`()";
            return $this->getJSON($sql);

        }

        function filterBookingSupply($FlightNo,$BookingClass, $Currency){

            $sql = "CALL `sp_filterBookingSupply`('{$FlightNo}','{$BookingClass}', '{$Currency}')";
            return $this->getJSON($sql);

        }


        function deleteBookingSupply($BookingSupplyId){

            $sql = "CALL `sp_deleteBookingSupply`({$BookingSupplyId})";
            $this->getData($sql);
            return ["status"=>"success", "message"=>"Booking Supply deleted successfully"];

        }
    }


?>