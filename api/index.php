<?php
define("HTTP_OK", 200);
define("HTTP_NOT_FOUND", 404);
define("HTTP_METHOD_NOT_ALLOWED", 405);

function sendHttpResponse(array $payload, int $statusCode = HTTP_OK)
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Content-Type: application/json");
    http_response_code($statusCode);
    echo json_encode($payload);
    exit;
}


$exercises = [
    [
        'id' => uniqid(),
        'name' => "Exercise 01",
    ],
    [
        'id' => uniqid(),
        'name' => "Exercise 02",
    ],
    [
        'id' => uniqid(),
        'name' => "Exercise 03",
    ],
    [
        'id' => uniqid(),
        'name' => "Exercise 04",
    ],
    [
        'id' => uniqid(),
        'name' => "Exercise 05",
    ],
];

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    sendHttpResponse(
        ['data' => [], 'error' => 'Method Not Allowed'],
        HTTP_METHOD_NOT_ALLOWED
    );
}

$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
$foundedExercises = array_filter(
    $exercises,
    fn (array $exercise): bool => str_starts_with($exercise['name'], $search)
);


if (empty($foundedExercises)) {
    sendHttpResponse(
        ['data' => [], 'error' => 'Exercises not found'],
        HTTP_NOT_FOUND
    );
}

sendHttpResponse(['data' => $foundedExercises, 'error' => '']);
