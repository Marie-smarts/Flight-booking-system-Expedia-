<?php
require_once '../Models/airport.php';
$airport = new Airport();

// Handle saving airport
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveAirport'])) {
    $AirportId   = $_POST['AirportId']   ?? null;
    $AirportCode = $_POST['AirportCode'] ?? '';
    $AirportName = $_POST['AirportName'] ?? '';
    $CityId      = $_POST['CityId']      ?? null;

    $response = $airport->saveAirport($AirportId, $AirportCode, $AirportName, $CityId);
    echo json_encode($response);
    exit;
}

// Handle filtering airports
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filterAirport'])) {
    $CityName    = $_GET['CityName']    ?? '';
    $AirportName = $_GET['AirportName'] ?? '';
    $CountryName = $_GET['CountryName'] ?? '';
    $AirportCode = $_GET['AirportCode'] ?? '';

    echo $airport->filterAirport($CityName, $AirportName, $CountryName, $AirportCode);
    exit;
}

// Handle getting all airports
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getAirport'])) {
    echo $airport->getAirport();
    exit;
}

// Handle deleting airport
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteAirport'])) {
    $AirportId = $_POST['AirportId'] ?? null;

    if ($AirportId) {
        $response = $airport->deleteAirport($AirportId);
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Airport ID is required']);
    }
    exit;
}

// Fallback for invalid requests
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);

