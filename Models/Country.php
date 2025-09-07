<?php

    require_once ('db.php');

    class country extends db{

        function checkCountry($CountryId,$CountryName){

            $sql = "CALL `sp_checkCountry`({$CountryId}, '{$CountryName}')";
            return $this->getData($sql)->rowCount();


        }

        function saveCountry($CountryId,$CountryName){

            if($this->checkCountry($CountryId,$CountryName)){
                //Checks to see if the country already exists.
                //If it does it returns the mesage below

                return ["status" => "exists", "message" => "Country ". $CountryName ." already exists!"];

            }
            else{
                //If the country doesn't exist, it saves the country
                //and returns the meassage below

                $sql = "CALL `sp_saveCountry`({$CountryId},'{$CountryName}')";
                $this->getData($sql);
                return ["status"=>"success","message"=>"Country saved successfully!"];

            }

        }

        function getCountry(){

            $sql="CALL `sp_getCountry`()";
            return $this->getJSON($sql);

        }

        function getCountryDetails($CountryId){

            $sql="CALL `sp_getCountryDetails`({$CountryId})";
            return $this->getJSON($sql);

        }

        function deleteCountry($CountryId){

           $sql="CALL `sp_deleteCountry`({$CountryId})" ;
           $this->getData($sql);
           return["status"=>"success","message"=>"Country has been deleted successfully!"];

        }
    }

    
?>