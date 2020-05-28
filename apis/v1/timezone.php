<?php
    header('Content-Type: application/json');
    $date = new DateTime($_POST['from_datetime'], new DateTimeZone($_POST['from_timezone']));
    $date->setTimezone(new DateTimeZone($_POST['to_timezone']));
    echo json_encode(array("to_datetime" => $date->format('Y-m-d H:i:sP')));
?>