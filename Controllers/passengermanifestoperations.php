<?php


    require_once("../Models/passengermanifest.php");
    $passengermanifest = new passengermanifest();

    if(isset($_POST['savePassengerManifest'])){
        $PassengerId = $_POST['PassengerId'];
        $Booking_Id = $_POST['Booking_Id'];
        $Booking_Class_Id = $_POST['Booking_Class_Id'];
        $Price = $_POST['Price'];
        $Currency_Id_ = $_POST['Currency_Id_'];
        $IdentificationId = $_POST['IdentificationId'];
        $PassengerName = $_POST['PassengerName'];
        $DOB = $_POST['DOB'];
        $GenderId = $_POST['GenderId'];
        $response = $passengermanifest->savePassengerManifest($PassengerId,$Booking_Id,$Booking_Class_Id,$Price,$Currency_Id_,$IdentificationId,$PassengerName,$DOB,$GenderId);
        echo json_encode($response);
    }

    if(isset($_GET['getPassengerManifest'])){
        echo $passengermanifest->getPassengerManifest();
    }

    if(isset($_POST['deletePassengerManifest'])){
        $PassengerId = $_POST['PassengerId'];
        $response = $passengermanifest->deletePassengerManifest($PassengerId);
        echo json_encode($response);
    }

    if(isset($_GET['filterPassengerManifest'])){
        $BookingClass = $_GET['BookingClass'];
        $Price = $_GET['Price'];
        $CurrencyName = $_GET['CurrencyName'];
        $IdentificationName = $_GET['IdentificationName'];
        $PassengerName = $_GET['PassengerName'];
        $Gender = $_GET['Gender'];
        $response = $passengermanifest->filterPassengerManifest($BookingClass, $Price
        echo $response;
    }

?>