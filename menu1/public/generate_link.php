<?php
// Database configuration (same as before)
$servername = "localhost";
$username = "u503668574_clickdaily";
$password = "$2wMOq@TzR";
$dbname = "u503668574_clickdaily";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user has a click cookie
if (isset($_COOKIE['click'])) {
    echo 'You have already clicked today. Come back tomorrow!';
} else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $today_start = date('Y-m-d 00:00:00');
    $today_end = date('Y-m-d 23:59:59');

    // Check if there is already a record for this IP today
    $existing_record_query = "SELECT * FROM click_history WHERE ip_address = '$ip_address' AND click_time BETWEEN '$today_start' AND '$today_end'";
    $result = $conn->query($existing_record_query);

    if ($result->num_rows > 0) {
        echo 'You have already clicked today. Come back tomorrow!';
    } else {
        if (isset($_POST['click_button'])) {
            // Set a click cookie for 24 hours
            setcookie('click', 'clicked', time() + (24 * 3600), "/");

            // Extract group_id from the URL
            $group_id = isset($_GET['group_id']) ? intval($_GET['group_id']) : 0;

            // Insert click record into the database with group_id
            $insert_query = "INSERT INTO click_history (ip_address, click_time, group_id) VALUES ('$ip_address', NOW(), $group_id)";

            if ($conn->query($insert_query) === TRUE) {
                echo 'Click recorded!';
            } else {
                echo 'Error recording click: ' . $conn->error;
            }
        } else {
            // User hasn't clicked yet, allow the click
            echo '<form method="post" action="">
                    <input type="submit" name="click_button" value="Click me!">
                  </form>';
        }
    }
}

$conn->close();
?>
