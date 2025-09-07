<?php

    require_once("../Models/bookingtype.php");
    $bookingtype = new bookingtype();

    if(isset($_POST['saveBookingType'])){

        $BookingTypeId = $_POST['BookingTypeId'];
        $BookingName = $_POST['BookingName'];

        $response = $bookingtype->saveBookingType($BookingTypeId,$BookingName);
        echo json_encode($response);
    }

    if(isset($_GET['getBookingType'])){

        echo $bookingtype->getBookingType();

    }

    if(isset($_GET['filterBookingType'])){

        $BookingName = $_GET['BookingName'];
        echo $bookingtype->filterBookingType($BookingName);

    }

    if(isset($_POST['deleteBookingType'])){

        $BookingTypeId = $_POST['BookingTypeId'];
        $response = $bookingtype->deleteBookingType($BookingTypeId);
        echo json_encode($response);

    }



?>