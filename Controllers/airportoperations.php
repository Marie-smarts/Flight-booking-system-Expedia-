<?php

    require_once("../Models/airport.php");
    $airport = new airport();

    if (isset($_POST['saveAirport'])){

        $AirportId = $_POST['AirportId'];
        $AirportCode = $_POST['AirportCode'];
        $AirportName = $_POST['AirportName'];
        $CityId = $_POST['CityId'];

        $response = $airport->saveAirport($AirportId, $AirportCode, $AirportName, $CityId);
        echo json_encode($response);
    }

    if (isset($_GET['filterAirport'])){

        $CityName = $_GET['CityName'];
        $AirportName = $_GET['AirportName'];
        $CountryName = $_GET['CountryName'];
        $AirportCode = $_GET['AirportCode'];

        echo $airport->filterAirport($CityName, $AirportName, $CountryName, $AirportCode);

    }

    if (isset($_GET['getAirport'])){

        echo $airport->getAirport();

    }

    if (isset($_POST['deleteAirport'])){

        $AirportId = $_POST['AirportId'];
        $response = $airport->deleteAirport($AirportId);
        echo json_encode($response);
    }

 

?>