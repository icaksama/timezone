<?php
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
?>

<html>
    <head>
        <title>TimeZone Test</title>
    </head>

    <body>
        <?php
            $query = $mysqli->query("SELECT `zone_name` FROM `zone`");
        ?>
        <h1>Timezone Conversion</h1>
        <form method="POST" action="">
            <label>
                <b>From</b>
                <input type="datetime-local" name="date_from">
                <select name="from">
                    <?php
                        while($row = $query->fetch_assoc()) {
                            if ($row['zone_name'] == $_POST['from']) {
                                echo "<option selected>".$row['zone_name']."</option>";
                            } else {
                                echo "<option>".$row['zone_name']."</option>";
                            }
                        }
                    ?>
                </select>
            </label>
            <label>
                <b>To</b>
                <select name="to">
                    <?php
                        $query->data_seek(0);
                        while($row = $query->fetch_assoc()) {
                            if ($row['zone_name'] == $_POST['to']) {
                                echo "<option selected>".$row['zone_name']."</option>";
                            } else {
                                echo "<option>".$row['zone_name']."</option>";
                            }
                        }
                    ?>
                </select>
            </label>
            <label>
                <input type="submit" name="submit">
            </label>
        </form>
        <h2>Result</h2>
        <?php
            if (isset($_POST['submit'])) {
                // $input = date_default_timezone_set($_POST['from']); // YOUR timezone, of the server
                // $date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone($_POST['to'])); // USER's timezone
                // $date->setTimezone(new DateTimeZone('UTC'));
                // echo $date->format('Y-m-d H:i:s');
                $date = new DateTime($_POST['date_from'], new DateTimeZone($_POST['from']));
                echo "<p>From ".$_POST['from'].": <b>".$date->format('Y-m-d H:i:sP') . "</b></p>";
                $date->setTimezone(new DateTimeZone($_POST['to']));
                echo "<p>To ".$_POST['to'].": <b>".$date->format('Y-m-d H:i:sP') . "</b></p>";
            }
        ?>
    </body>
</html>