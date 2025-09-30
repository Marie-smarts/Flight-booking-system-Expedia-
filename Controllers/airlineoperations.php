<?php
require_once '../Models/airline.php';
$airline = new Airline();

// Handle saving airline
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveAirline'])) {
    $AirlineId   = $_POST['AirlineId']   ?? null;
    $AirlineName = $_POST['AirlineName'] ?? '';
    $AirlineLogo = $_POST['AirlineLogo'] ?? '';
    $CountryId   = $_POST['CountryId']   ?? null;
    $AirlineCode = $_POST['AirlineCode'] ?? '';

    $response = $airline->saveAirline($AirlineId, $AirlineName, $AirlineLogo, $CountryId, $AirlineCode);
    echo json_encode($response);
    exit;
}

// Handle getting all airlines
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getAirline'])) {
    echo $airline->getAirline();
    exit;
}

// Handle filtering airlines
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filterAirline'])) {
    $AirlineName = $_GET['AirlineName'] ?? '';
    $CountryName = $_GET['CountryName'] ?? '';
    $AirlineCode = $_GET['AirlineCode'] ?? '';

    echo $airline->filterAirline($AirlineName, $CountryName, $AirlineCode);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteAirline'])) {
    $AirlineId = $_POST['AirlineId'] ?? null;

    if ($AirlineId) {
        $response = $airline->deleteAirline($AirlineId);
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Airline ID is required']);
    }
    exit;
}

// Fallback for invalid requests
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
