<?php
// API endpoint URL that produces a JSON format link
$api_endpoint = "http://marcconrad.com/uob/smile/api.php";

// Make a request to the API endpoint
$response = file_get_contents($api_endpoint);

// Decode the JSON response
$data = json_decode($response);

// Get the image URL from the JSON response
$image_url = $data->question;

// Fetch the image from the URL
$image = file_get_contents($image_url);

// Display the image
//echo "<img src='data:image/png;base64," . base64_encode($image) . "' />";


// Get the solution from the JSON response
$solution = $data->solution;

?>


