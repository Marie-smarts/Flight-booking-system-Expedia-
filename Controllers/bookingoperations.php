<?php


    require_once("../Models/booking.php");
    $booking = new booking();

    if(isset($_POST['saveBooking'])){
        $BookingId = $_POST['BookingId'];
        $BookingClass_Id = $_POST['BookingClassId'];
        $BookingDate = $_POST['BookingDate'];
        $PaymentMethod_Id = $_POST['PaymentMethodId'];
        $Flight_Id = $_POST['FlightId'];
        $Currency_Id = $_POST['CurrencyId'];
        
        $response = $booking->saveBooking($BookingId,$BookingClass_Id,$Currency_Id,$Flight_Id,$BookingDate,$PaymentMethod_Id)
        echo json_encode($response);
    }

    if(isset($_GET['getBooking'])){
        echo $booking->getBooking();
    }


    if(isset($_POST['deleteBooking'])){
        $BookingId = $_POST['BookingId'];
        $response = $booking->deleteBooking($BookingId);
        echo json_encode($response);
    }

    if(isset($_GET['filterBooking'])){
        $BookingClass = $_GET['BookingClass'];
        $CurrencyName = $_GET['CurrencyName'];
        $FlightNo = $_GET['FlightNo'];
        $PaymentType = $_GET['PaymentType'];

        $response = $booking->filterBooking($BookingClass, $CurrencyName,$FlightNo,$PaymentType);
        echo $response;
    }

?>