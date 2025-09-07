<?php


    require_once("../Models/bookingsupply.php");
    $bookingsupply = new bookingsupply();

    if(isset($_POST['saveBookingSupply'])){
        $BookingSupplyId = $_POST['BookingSupplyId'];
        $FlightId = $_POST['FlightId'];
        $BookingClassId = $_POST['BookingClassId'];
        $NoOfSeats = $_POST['NoOfSeats'];
        $Price = $_POST['Price'];
        $CurrencyId = $_POST['CurrencyId'];
        $response = $bookingsupply->saveBookingSupply($BookingSupplyId, $FlightId, $BookingClassId, $NoOfSeats, $Price, $CurrencyId);
        echo json_encode($response);
    }

    if(isset($_GET['getBookingSupply'])){
        echo $bookingsupply->getBookingSupply();
    }

 
    if(isset($_POST['deleteBookingSupply'])){
        $BookingSupplyId = $_POST['BookingSupplyId'];
        $response = $bookingsupply->deleteBookingSupply($BookingSupplyId);
        echo json_encode($response);
    }

    if(isset($_GET['filterBookingSupply'])){
        $FlightNo = $_GET['FlightNo'];
        $BookingClass = $_GET['BookingClass'];
        $Currency = $_GET['Currency'];
        $response = $bookingsupply->filterBookingSupply($FlightNo, $BookingClass, $Currency);
        echo $response;
    }

?>