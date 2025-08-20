<?php

    require_once ('db.php');

    class identification extends db{

        function checkIdentification($IdentificationId,$DocumentName){

            $sql = "CALL `sp_checkIdentification`({$IdentificationId},'{$DocumentName}')";
            $this->getData($sql)->rowCount();

        }

        function saveIdentification($IdentificationId,$DocumentName){

            if($this->checkIdentification($IdentificationId,$DocumentName)){

                return ["status" => "exists", "message" => $DocumentName . " identification type already exists."];

            } else {

            $sql = "CALL `sp_saveIdentification`({$IdentificationId},'{$DocumentName}')";
            $this->getData($sql);
            return ["status" => "success", "message" => $DocumentName . " identification type has been successfully saved."];

            }

        }

        function filterIdentification($DocumentName){

            $sql = "CALL `sp_filterIdentification`('{$DocumentName}')";
            return $this->getJSON($sql);

        }

        function getIdentification(){

            $sql = "CALL `sp_getIdentification`()";
            return $this->getJSON($sql);

        }


        function deleteIdentification($IdentificationId){

            $sql = "CALL `sp_deleteIdentification`({$IdentificationId})";
            $this->getData($sql);
            return ["status" => "success", "message" => "Identification type has been deleted successfully."];

        }
    }



?>