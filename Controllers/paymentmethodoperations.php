<?php

    require_once ("../Models/paymentmethod.php");
    $paymentMethod = new paymentMethod();

    if(isset($_POST['savePaymentMethod'])){

        $PaymentMethodId = $_POST['PaymentMethodId'];
        $PaymentType = $_POST['PaymentType'];
        $response = $paymentMethod->savePaymentMethod($PaymentMethodId,$PaymentType);

        echo json_encode($response);
    }

    if(isset($_GET['getPaymentMethod'])){

        echo $paymentMethod->getPaymentMethod();

    }

    if(isset($_GET['filterPaymentMethod'])){

        $PaymentType = $_GET['PaymentType'];
        echo $paymentMethod->filterPaymentMethod($PaymentType);

    }

    if(isset($_POST['deletePaymentMethod'])){

        $PaymentMethodId = $_POST['PaymentMethodId'];
        $response = $paymentMethod->deletePaymentMethod($PaymentMethodId);

        echo json_encode($response);
    }



?>