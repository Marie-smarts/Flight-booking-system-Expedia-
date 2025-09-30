<?php
require_once '../Models/booking.php';
$booking = new Booking();

// Handle saving booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveBooking'])) {
    $BookingId        = $_POST['BookingId']        ?? null;
    $BookingClass_Id  = $_POST['BookingClassId']   ?? null;
    $BookingDate      = $_POST['BookingDate']      ?? '';
    $PaymentMethod_Id = $_POST['PaymentMethodId']  ?? null;
    $Flight_Id        = $_POST['FlightId']         ?? null;
    $Currency_Id      = $_POST['CurrencyId']       ?? null;

    $response = $booking->saveBooking(
        $BookingId,
        $BookingClass_Id,
        $Currency_Id,
        $Flight_Id,
        $BookingDate,
        $PaymentMethod_Id
    );

    echo json_encode($response);
    exit;
}

// Handle getting all bookings
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getBooking'])) {
    echo $booking->getBooking();
    exit;
}

// Handle deleting booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBooking'])) {
    $BookingId = $_POST['BookingId'] ?? null;

    if ($BookingId) {
        $response = $booking->deleteBooking($BookingId);
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Booking ID is required']);
    }
    exit;
}

// Handle filtering bookings
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filterBooking'])) {
    $BookingClass = $_GET['BookingClass'] ?? '';
    $CurrencyName = $_GET['CurrencyName'] ?? '';
    $FlightNo     = $_GET['FlightNo']     ?? '';
    $PaymentType  = $_GET['PaymentType']  ?? '';

    echo $booking->filterBooking($BookingClass, $CurrencyName, $FlightNo, $PaymentType);
    exit;
}

// Fallback for invalid requests
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
