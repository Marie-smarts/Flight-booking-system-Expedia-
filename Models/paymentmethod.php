<?php

    require_once("db.php");

    class paymentMethod extends db{

        function checkPaymentMethod($PaymentMethodId, $PaymentType){

            $sql = "CALL `sp_checkPaymentMethod`({$PaymentMethodId}, '{$PaymentType}')";
            return $this->getData($sql)->rowCount();

        }

        function savePaymentMethod($PaymentMethodId,$PaymentType){

            if($this->checkPaymentMethod($PaymentMethodId, $PaymentType)){

                return ["status"=>"exists", "message" => $PaymentType . " already exists!"];

            } else {

            $sql = "CALL `sp_savePaymentMethod`({$PaymentMethodId},'{$PaymentType}')";
            $this->getData($sql);
            return ["status"=>"success", "message" => "the Payment method was saved successfully"];
            }

        }

        function getPaymentMethod(){

            $sql = "CALL  `sp_getPaymentMethod`()";
            return $this->getJSON($sql);

        }

        function filterPaymentMethod($PaymentType){

            $sql = "CALL `sp_filterPaymentMethod`('{$PaymentType}')";
            return $this->getJSON($sql);

        }

        function deletePaymentMethod($PaymentMethodId){

            $sql = "CALL `sp_deletePaymentMethod`({$PaymentMethodId})";
            $this->getData($sql);
            return ["status"=>"success", "message" => "The Payment method was deleted successfully"];

        }
    }



?>