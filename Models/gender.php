<?php

    require_once("db.php");

    class gender extends db{

        function checkGender($GenderId, $Gender){

            $sql = "CALL `sp_checkGender`({$GenderId}, '{$Gender}')";
            return $this->getData($sql)->rowCount(); 
        }


        function saveGender($GenderId,$Gender){

            if($this->checkGender($GenderId, $Gender)){

                //Check if the Gender already exists if it exists return the message below
                return ["status"=>"exist","message"=>"Gender already exists"];

            }else{

                //If the Gender name doesn't already exist save the record
                $sql ="CALL `sp_saveGender`({$GenderId},'{$Gender}')";
                $this->getData($sql);
                return ["status"=>"success", "message"=>"Gender saved successfully"];
            }

        }


        function getGender(){

            $sql = "CALL `sp_getGender`()";
            return $this->getJSON($sql);

        }

        function filterGender($Gender){

            $sql="CALL  `sp_filterGender`('{$Gender}')";
            return $this->getJSON($sql);

        }

        function deleteGender($GenderId){

            $sql="CALL `sp_deleteGender`({$GenderId})";
            $this->getData($sql);
            return ["status"=>"success","message"=>"The record is deleted successfully"];

        }
    }





?>