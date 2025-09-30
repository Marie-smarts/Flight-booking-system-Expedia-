<?php
require_once '../Models/bookingclass.php';
$bookingclass = new BookingClass();

// Handle saving booking class
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveBookingClass'])) {
    $BookingClassId = $_POST['BookingClassId'] ?? null;
    $TypeName       = $_POST['TypeName']       ?? '';

    $response = $bookingclass->saveBookingClass($BookingClassId, $TypeName);
    echo json_encode($response);
    exit;
}

// Handle getting all booking classes
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getBookingClass'])) {
    echo $bookingclass->getBookingClass();
    exit;
}

// Handle filtering booking classes
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filterBookingClass'])) {
    $TypeName = $_GET['TypeName'] ?? '';

    echo $bookingclass->filterBookingClass($TypeName);
    exit;
}

// Handle deleting booking class
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBookingClass'])) {
    $BookingClassId = $_POST['BookingClassId'] ?? null;

    if ($BookingClassId) {
        $response = $bookingclass->deleteBookingClass($BookingClassId);
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Booking Class ID is required']);
    }
    exit;
}

// Fallback for invalid requests
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
