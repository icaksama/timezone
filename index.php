<?php
error_reporting(0);
include_once './includes/url_validator.php';
// Create connection
$mysqli = new mysqli(
    "127.0.0.1", 
    "root", 
    "{devpass123}", 
    "timezonedb"
);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (URLValidator::get_url_paths()[0] == "v1" && URLValidator::get_url_paths()[1] == "timezone") {
    include_once "./apis/v1/timezone.php";
} else {
    include_once "./includes/timezone_form.php";
}
?>