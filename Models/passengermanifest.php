<?php

    require_once ("db.php");
    class passengermanifest extends db{


        function checkPassengerManifest($PassengerId){

            $sql = "CALL `sp_checkPassengerManifest`({$PassengerId})";
            return $this->getData($sql)->rowCount();

        }

        function savePassengerManifest($PassengerId,$Booking_Id,$Booking_Class_Id,$Price,$Currency_Id_,$IdentificationId,$PassengerName,$DOB,$GenderId ){

            if($this->checkPassengerManifest($PassengerId)){

                return ["status"=>"exists", "message"=>"Passenger Manifest already exists"];

            }else{

            $sql = "CALL  `sp_savePassengerManifest`( {$PassengerId},{$Booking_Id},{$Booking_Class_Id},'{$Price}',{$Currency_Id_},{$IdentificationId},'{$PassengerName}','{$DOB}',{$GenderId })";
            $this->getData($sql);
            return ["status"=>"success", "message"=>"Passenger Manifest saved successfully"];

            }
        }


        function getPassengerManifest(){

            $sql = "CALL `sp_getPassengerManifest`()";
            return $this->getJSON($sql);

        }


        function filterPassengerManifest($BookingClass, $Price, $CurrencyName, $IdentificationName, $PassengerName, $Gender){

            $sql = "CALL `sp_filterPassengerManifest`('{$BookingClass}', '{$Price}', '{$CurrencyName}', '{$IdentificationName}', '{$PassengerName}', '{$Gender}')";
            return $this->getJSON($sql);

        }

        function deletePassengerManifest(){

            $sql = "CALL `sp_deletePassengerManifest`({$PassengerId})";
            $this->getData($sql);
            return ["status"=>"success", "message"=>"Passenger Manifest deleted successfully"];
        }
    }



?>