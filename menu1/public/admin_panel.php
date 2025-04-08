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

// Functions to handle form submissions
if (isset($_POST['create_group'])) {
    $group_name = $_POST['group_name'];

    // Insert new group into the database
    $insert_group_query = "INSERT INTO groups (group_name) VALUES ('$group_name')";
    $conn->query($insert_group_query);
}

if (isset($_POST['edit_group'])) {
    $group_id = $_POST['edit_group_id'];
    $new_group_name = $_POST['new_group_name'];

    // Update group name in the database
    $update_group_query = "UPDATE groups SET group_name = '$new_group_name' WHERE id = $group_id";
    $conn->query($update_group_query);
}

if (isset($_POST['delete_group'])) {
    $group_id = $_POST['delete_group_id'];

    // Delete group from the database
    $delete_group_query = "DELETE FROM groups WHERE id = $group_id";
    $conn->query($delete_group_query);
}
$today_start = date('Y-m-d 00:00:00');
    $today_end = date('Y-m-d 23:59:59');
// Query to get the list of groups
$get_groups_query = "SELECT groups.id, groups.group_name, 
                    COUNT(click_history.id) as click_count_today,
                    COUNT(click_history.id) as total_click_count
                    FROM groups
                    LEFT JOIN click_history ON groups.id = click_history.group_id
                    WHERE click_history.click_time BETWEEN '$today_start' AND '$today_end'
                    GROUP BY groups.id, groups.group_name";
$groups_result = $conn->query($get_groups_query);

$groups_result = $conn->query($get_groups_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>

    <!-- Form to create a new group -->
    <form method="post" action="">
        <label>Create a new group:</label>
        <input type="text" name="group_name" required>
        <input type="submit" name="create_group" value="Create Group">
    </form>

    <!-- Display the list of groups in a table -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Group Name</th>
            <th>Click Count Today</th>
            <th>Total Click Count</th>
            <th>Actions</th>
            <th>Link</th>
        </tr>
        <?php
        while ($group = $groups_result->fetch_assoc()) {
            echo "<tr>
                    <td>{$group['id']}</td>
                    <td>{$group['group_name']}</td>
                    <td>{$group['click_count_today']}</td>
                    <td>{$group['total_click_count']}</td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='edit_group_id' value='{$group['id']}'>
                            <input type='text' name='new_group_name' placeholder='New Name' required>
                            <input type='submit' name='edit_group' value='Edit'>
                        </form>
                        <form method='post' action=''>
                            <input type='hidden' name='delete_group_id' value='{$group['id']}'>
                            <input type='submit' name='delete_group' value='Delete'>
                        </form>
                    </td>
                    <td><a href='generate_link.php?group_id={$group['id']}'>Generate Link</a></td>
                </tr>";
        }
        ?>
    </table>

</body>
</html>
