<?php

    require_once("db.php");

    class booking extends db{

        function checkBooking($BookingId){

            $sql = "CALL `sp_checkBooking`({$BookingId})";
            return $this->getData($sql)->rowCount();
        }

        function saveBooking($BookingId,$BookingClass_Id,$Currency_Id,$Flight_Id,$BookingDate,$PaymentMethod_Id){

            if($this->checkBooking($BookingId)){

                return ["status"=>"exists", "message" => "Booking ID " . $BookingId . " already exists!"];

            } else {

            $sql = "CALL `sp_saveBooking`({$BookingId},{$BookingClass_Id},{$Currency_Id},{$Flight_Id},'{$BookingDate}',{$PaymentMethod_Id})";
            $this->getData($sql);
            return ["status"=>"success", "message" => "the Booking was saved successfully"];
            }
        }


        function getBooking(){

            $sql = "CALL  `sp_getBooking`()";
            return $this->getJSON($sql);

        }

        function filterBooking($BookingClass, $CurrencyName,$FlightNo,$PaymentType){

            $sql = "CALL `sp_filterBooking`('{$BookingClassType}','{$CurrencyName}','{$FlightNo}','{$PaymentType}')";
            return $this->getJSON($sql);

        }

        function deleteBooking($BookingId){

            $sql = "CALL `sp_deleteBooking`({$BookingId})";
            $this->getData($sql);
            return ["status"=>"success", "message" => "The Booking was deleted successfully"];

        }
    }






?>