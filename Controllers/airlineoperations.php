<?php

    require_once '../Models/airline.php';
    $airline = new airline();

    if(isset($_POST['saveAirline'])){

        $AirlineId = $_POST['AirlineId'];
        $AirlineName = $_POST['AirlineName'];
        $AirlineLogo = $_POST['AirlineLogo'];
        $CountryId = $_POST['CountryId'];
        $AirlineCode = $_POST['AirlineCode'];

        $response = $airline->saveAirline($AirlineId,$AirlineName,$AirlineLogo,$CountryId,$AirlineCode);
        echo json_encode($response);
    }

    if(isset($_GET['getAirline'])){

        echo $airline->getAirline();
    }

    if(isset($_GET['filterAirline'])){

        $AirlineName = $_GET['AirlineName'];
        $CountryName = $_GET['CountryName'];
        $AirlineCode = $_GET['AirlineCode'];

        echo $airline->filterAirline($AirlineName,$CountryName,$AirlineCode);

    }

    if(isset($_POST['deleteAirline'])){

        $AirlineId = $_POST['AirlineId'];

        $response = $airline->deleteAirline($AirlineId);
        echo json_encode($response);

    }

   
?>