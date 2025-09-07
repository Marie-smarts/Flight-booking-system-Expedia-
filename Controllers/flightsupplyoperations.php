<?php

    require_once ("../Models/flightsupply.php");
    $flightsupply = new flightsupply();

    if(isset($_POST['saveFlightSupply'])){

        $FlightId = $_POST['FlightId'];
        $FlightNo = $_POST['FlightNo'];
        $AirlineId = $_POST['AirlineId'];
        $DepartureTime = $_POST['DepartureTime'];
        $DepartureCityId = $_POST['DepartureCityId'];
        $ArrivalTime = $_POST['ArrivalTime'];
        $DestinationCityId = $_POST['DestinationCityId'];

        $response = $flightsupply->saveFlightSupply($FlightId,$FlightNo,$AirlineId,$DepartureTime,$DepartureCityId,$ArrivalTime,$DestinationCityId);
        echo json_encode($response);
    }

    if(isset($_GET['getFlightSupply'])){

        $response = $flightsupply->getFlightSupply();
        echo $response;

    }

    if(isset($_GET['filterFlightSupply'])){

        $FlightNo = $_GET['FlightNo'];
        $AirlineName = $_GET['AirlineName'];
        $DepartureCity = $_GET['DepartureCity'];
        $DestinationCity = $_GET['DestinationCity'];

        $response = $flightsupply->filterFlightSupply($FlightNo, $AirlineName, $DepartureCity, $DestinationCity);
        echo $response;

    }


    if(isset($_POST['deleteFlightSupply'])){

        $FlightId = $_POST['FlightId'];

        $response = $flightsupply->deleteFlightSupply($FlightId);
        echo json_encode($response);
        
    }

?>