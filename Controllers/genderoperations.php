<?php
require_once '../Models/gender.php';
$gender = new Gender();

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

// Handle saving gender
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveGender'])) {
    $GenderId = $_POST['GenderId'] ?? null;
    $Gender   = trim($_POST['Gender'] ?? '');

    if (!$Gender) {
        respond('error', null, 'Gender is required');
    }

    try {
        $response = $gender->saveGender($GenderId, $Gender);
        respond('success', $response, 'Gender saved successfully');
    } catch (Throwable $e) {
        http_response_code(500);
        respond('error', null, $e->getMessage());
    }
}

// Handle getting all genders
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getGender'])) {
    try {
        $response = $gender->getGender();
        respond('success', $response);
    } catch (Throwable $e) {
        http_response_code(500);
        respond('error', null, $e->getMessage());
    }
}

// Handle filtering genders
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filterGender'])) {
    $Gender = trim($_GET['Gender'] ?? '');

    try {
        $response = $gender->filterGender($Gender);
        respond('success', $response);
    } catch (Throwable $e) {
        http_response_code(500);
        respond('error', null, $e->getMessage());
    }
}

// Handle deleting gender
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteGender'])) {
    $GenderId = $_POST['GenderId'] ?? null;

    if (!$GenderId) {
        respond('error', null, 'Gender ID is required');
    }

    try {
        $response = $gender->deleteGender($GenderId);
        respond('success', $response, 'Gender deleted successfully');
    } catch (Throwable $e) {
        http_response_code(500);
        respond('error', null, $e->getMessage());
    }
}

// Fallback for invalid requests
http_response_code(400);
respond('error', null, 'Invalid request');
