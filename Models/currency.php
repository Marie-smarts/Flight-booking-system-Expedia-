<?php

    require_once('db.php');

    class currency extends db{

        function checkCurrency($CurrencyId, $CurrencyName){

            $sql = "CALL `sp_checkCurrency`({$CurrencyId}, '{$CurrencyName}')";
            return $this->getData($sql)->rowCount();
            

        }

        function saveCurrency($CurrencyId,$CurrencyName,$DefaultCurrency,$ExchangeRate){

            if($this->checkCurrency($CurrencyId, $CurrencyName)){

                return ["status" => "exists" ,"message" => $CurrencyName. " already exists."];

            }
            else{

                $sql = "CALL `sp_saveCurrency`({$CurrencyId},'{$CurrencyName}','{$DefaultCurrency}',{$ExchangeRate})";
                $this->getData($sql);
                return ["status" => "successfull", "message" => $CurrencyName. " Currency has been saved"];

            }

        }

        function getCurrency(){

            $sql = "CALL `sp_getCurrency`( )";
            return $this->getJSON($sql);

        }

        function filterCurrency($CurrencyName){

            $sql = "CALL `sp_filterCurrency`('{$CurrencyName}')";
            return $this->getJSON($sql);

        }

        function deleteCurrency($CurrencyId){

            $sql = "CALL `sp_deleteCurrency`({$CurrencyId})";
            $this->getData($sql);
            return ["status" => "successfull", "message"=>"Currency Deleted!"];

        }
    }


?>