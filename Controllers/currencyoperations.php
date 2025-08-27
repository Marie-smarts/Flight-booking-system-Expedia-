<?php

    require_once("../Models/currency.php");

    $currency = new currency();

    if(isset($_POST['saveCurrency'])){


        $CurrencyId = $_POST['CurrencyId'];
        $CurrencyName = $_POST['CurrencyName'];
        $DefaultCurrency = $_POST['DefaultCurrency'];
        $ExchangeRate = $_POST['ExchangeRate'];

        $response = $currency->saveCurrency($CurrencyId,$CurrencyName,$DefaultCurrency,$ExchangeRate);
        echo json_encode($response);

    }

    if(isset($_GET['getCurrency'])){

        echo $currency->getCurrency();
    }

    if(isset($_GET['filterCurrency'])){

        $CurrencyName = $_GET['CurrencyName'];
        echo $currency->filterCurrency($CurrencyName);
    }

    if(isset($_POST['deleteCurrency'])){

        $CurrencyId = $_POST['CurrencyId'];

        $response = $currency-> deleteCurrency($CurrencyId);
        echo json_encode($response);
    }



?>