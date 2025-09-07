<?php

    require_once("../Models/bookingclass.php");
    $bookingclass = new bookingclass();

    if(isset($_POST['saveBookingClass'])){

        $BookingClassId = $_POST['BookingClassId'];
        $TypeName = $_POST['TypeName'];

        $response = $bookingclass->saveBookingClass($BookingClassId, $TypeName);

        echo json_encode($response);
    }

    if(isset($_GET['getBookingClass'])){

        echo $bookingclass->getBookingClass();

    }

    if(isset($_GET['filterBookingClass'])){

        $TypeName = $_GET['TypeName'];

        echo $bookingclass->filterBookingClass($TypeName);

    }

    if(isset($_POST['deleteBookingClass'])){

        $BookingClassId = $_POST['BookingClassId'];

        $response = $bookingclass->deleteBookingClass($BookingClassId);

        echo json_encode($response);
    }



?>