<?php

require_once 'db.php';


// Set content type to JSON
header('Content-Type: application/json');

// Set up the API endpoint
$endpoint = '/app/';

// Check if the endpoint was requested
if ($_SERVER['REQUEST_URI'] === $endpoint) {
    
    // Check if the request method is GET
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        // Create a response array
        $response = array(
            'message' => 'Hello, world!'
        );
        
        // Send the response as JSON
        echo json_encode($response);
        
    } else {
        
        // If the request method is not GET, return a 405 Method Not Allowed error
        http_response_code(405);
        echo json_encode(array('error' => 'Method Not Allowed'));
        
    }
    
} else {
    
    // If the endpoint was not requested, return a 404 Not Found error
    http_response_code(404);
    echo json_encode(array('error' => 'Not Found'));
    
}

exit;

$result = db::query('SELECT * FROM users WHERE email = ?', array('user@example.com'));

print_r($result);exit;

while ($row = $result->fetch()) {
    echo $row['name'] . '<br>';
}

?>