<?php

    require_once("db.php");

    class bookingclass extends db{

        function checkBookingClass($BookingClassId, $TypeName){

            $sql = "CALL `sp_checkBookingClass`({$BookingClassId}, '{$TypeName}')";
            return $this->getData($sql)->rowCount();
        }

        function saveBookingClass($BookingClassId, $TypeName){

            if($this->checkBookingClass($BookingClassId, $TypeName)){

                return ["status"=>"exists", "message" => $TypeName . " already exists!"];

            } else {

            $sql="CALL `sp_saveBookingClass`({$BookingClassId},'{$TypeName}')";
            $this->getData($sql);
            return ["status"=>"success", "message" => "The Booking type was saved successfully"];
            
            }

        }

        function getBookingClass(){

            $sql="CALL `sp_getBookingClass`()";
            return $this->getJSON($sql);

        }


        function filterBookingClass($TypeName){

            $sql="CALL `sp_filterBookingClass`('{$TypeName}')";
            return $this->getJSON($sql);

        }


        function deleteBookingClass($BookingClassId){

            $sql = "CALL `sp_deleteBookingClass`({$BookingClassId})";
            $this->getData($sql);
            return ["status"=>"success", "message" => "The Booking type was deleted successfully"];
            
        }
    }



?>