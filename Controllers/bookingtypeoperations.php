<?php
require_once '../Models/bookingtype.php';
$bookingtype = new BookingType();

// Always return JSON
header('Content-Type: application/json');

/**
 * Helper: send JSON response and exit
 */
function respond($status, $data = null, $message = '') {
    echo json_encode([
        'status'  => $status,
        'data'    => $data,
        'message' => $message
    ]);
    exit;
}

// Handle saving booking type
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveBookingType'])) {
    $BookingTypeId = $_POST['BookingTypeId'] ?? null;
    $BookingName   = trim($_POST['BookingName'] ?? '');

    if (!$BookingName) {
        respond('error', null, 'Booking Name is required');
    }

    try {
        $response = $bookingtype->saveBookingType($BookingTypeId, $BookingName);
        respond('success', $response, 'Booking Type saved successfully');
    } catch (Throwable $e) {
        http_response_code(500);
        respond('error', null, $e->getMessage());
    }
}

// Handle getting all booking types
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getBookingType'])) {
    try {
        $response = $bookingtype->getBookingType();
        respond('success', $response);
    } catch (Throwable $e) {
        http_response_code(500);
        respond('error', null, $e->getMessage());
    }
}

// Handle filtering booking types
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filterBookingType'])) {
    $BookingName = trim($_GET['BookingName'] ?? '');

    try {
        $response = $bookingtype->filterBookingType($BookingName);
        respond('success', $response);
    } catch (Throwable $e) {
        http_response_code(500);
        respond('error', null, $e->getMessage());
    }
}

// Handle deleting booking type
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBookingType'])) {
    $BookingTypeId = $_POST['BookingTypeId'] ?? null;

    if (!$BookingTypeId) {
        respond('error', null, 'Booking Type ID is required');
    }

    try {
        $response = $bookingtype->deleteBookingType($BookingTypeId);
        respond('success', $response, 'Booking Type deleted successfully');
    } catch (Throwable $e) {
        http_response_code(500);
        respond('error', null, $e->getMessage());
    }
}

// Fallback for invalid requests
http_response_code(400);
respond('error', null, 'Invalid request');

