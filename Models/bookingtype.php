<?php

    require_once("db.php");

    class bookingtype extends db{

        function checkBookingType($BookingTypeId, $BookingName){

            $sql = "CALL `sp_checkBookingType`({$BookingTypeId}, '{$BookingName}')";
            return $this->getData($sql)->rowCount();

        }

        function saveBookingType($BookingTypeId,$BookingName){

            if($this->checkBookingType($BookingTypeId, $BookingName)){

                return ["status"=>"exists", "message" => $BookingName . " already exists!"];

            } else {

            $sql = "CALL `sp_saveBookingType`({$BookingTypeId},'{$BookingName}')";
            $this->getData($sql);
            return ["status"=>"success", "message" => "the Booking type was saved successfully"];
            }

        }

        function getBookingType(){

            $sql = "CALL  `sp_getBookingType`()";
            return $this->getJSON($sql);

        }

        function filterBookingType($BookingName){

            $sql = "CALL `sp_filterBookingType`('{$BookingName}')";
            return $this->getJSON($sql);

        }

        function deleteBookingType($BookingTypeId){

            $sql = "CALL `sp_deleteBookingType`({$BookingTypeId})";
            $this->getData($sql);
            return ["status"=>"success", "message" => "The Booking type was deleted successfully"];

        }
    }


?>