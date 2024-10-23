<?php
// Set the path for the data folder
$dataFolder = './data/team/';

// Get the JSON data from the POST request
$teamData = json_decode(file_get_contents('php://input'), true);

// Extract team name
$teamName = $teamData['teamName'];

// Create a valid filename
$filename = preg_replace('/[^a-zA-Z0-9-_]/', '_', $teamName) . '.json';
$filePath = $dataFolder . $filename;

// Create the directory if it does not exist
if (!file_exists($dataFolder)) {
    if (!mkdir($dataFolder, 0755, true) && !is_dir($dataFolder)) {
        echo json_encode(['success' => false, 'message' => 'Failed to create directory.']);
        exit;
    }
}

// Save the data to a JSON file
if (file_put_contents($filePath, json_encode($teamData, JSON_PRETTY_PRINT))) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Unable to save data.']);
}
?>