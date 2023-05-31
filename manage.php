<?php
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["name"])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="HR manager queries">
    <meta name="keywords" content="PHP, MySql, HTML">
    <title>EOI Management</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/x-icon" href="images/soe_logo_transparent_small.png">
</head>
<body>
    <h1>EOI Management</h1>
    <h2>List All EOIs</h2>
    <form action="manage.php" method="GET">
        <input type="hidden" name="action" value="list_all">
        <label for="sort_field">Sort By:</label>
        <select name="sort_field" id="sort_field">
            <option value="all">List All</option>
            <option value="EOInumber">EOI Number</option>
            <option value="Job_Reference">Job Reference</option>
            <option value="First_Name">First Name</option>
            <option value="Last_Name">Last Name</option>
            <option value="Gender">Gender</option>
            <option value="Status">Status</option>
        </select>
        <br>
        <input type="submit" value="List EOIs">
    </form>
    <hr>
    <h2>List EOIs For A Particular Position</h2>
    <form action="manage.php" method="GET" class="position-form">
        <input type="hidden" name="action" value="list_by_position">
        <label for="Job_Reference">Job Reference:</label>
        <input type="text" name="Job_Reference" id="Job_Reference">
        <input type="submit" value="List EOIs for Position">
    </form>
    <hr>
    <h2>List EOIs For A Particular Applicant</h2>
    <form action="manage.php" method="GET">
        <input type="hidden" name="action" value="list_by_applicant">
        <label for="First_Name">First Name:</label>
        <input type="text" name="First_Name" id="First_Name">
        <br>
        <label for="Last_name">Last Name:</label>
        <input type="text" name="Last_name" id="Last_Name">
        <br>
        <input type="submit" value="List EOIs for Applicant">
    </form>
    <hr>
    <h2>Delete EOIs With A Specified Job Reference Number</h2>
    <form action="manage.php" method="GET">
        <input type="hidden" name="action" value="delete_by_position">
        <label for="Job_Reference_delete">Job Reference:</label>
        <input type="text" name="Job_Reference" id="Job_Reference_delete">
        <input type="submit" value="Delete EOIs">
    </form>
    <hr>
    <h2>Change The Status Of An EOI</h2>
    <form action="manage.php" method="GET">
        <input type="hidden" name="action" value="change_status">
        <label for="eoi_number">EOI Number:</label>
        <input type="text" name="eoi_number" id="eoi_number">
        <br>
        <label for="status">Status:</label>
        <input type="text" name="status" id="status">
        <br>
        <input type="submit" value="Change Status">
    </form>
    <?php
    // Database connection
    require_once("settings.php");
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    // Check if connection is successful
    if (!$conn) {
        // Display an error message
        echo "<p>Database connection failure</p>";
    }
    // Function to sanitize user input
    function sanitizeInput($input)
    {
        // Perform sanitization here (e.g., trim, remove HTML control characters, etc.)
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    
    // List all EOIs
function listAllEOIs($conn, $sortField)
{
    $sortField = sanitizeInput($sortField);
    $sql = "SELECT * FROM EOI ORDER BY $sortField";
    $result = $conn->query($sql);
    // Display the results
    if ($result->num_rows > 0) {
        echo "<h2>All EOIs:</h2>";
        echo "<table>";
        echo "<tr><th>EOInumber</th><th>Job Reference</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["EOInumber"] . "</td><td>" . $row["Job_Reference"] . "</td><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["status"] . "</td></tr>";
        }
        echo "</table>";
        echo "<p class='success-message'>EOIs listed successfully.</p>";
    } else {
        echo "<p class='error-message'>No EOIs found.</p>";
    }
}
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] === 'list_all') {
    // Get the selected option from the "Sort By" field
    $selectedOption = isset($_GET['sort_field']) ? $_GET['sort_field'] : '';

    // Perform actions based on the selected option
    switch ($selectedOption) {
        case 'all':
            listAllEOIs($conn, 'EOInumber');
            break;
        case 'EOInumber':
        case 'Job_Reference':
        case 'First_Name':
        case 'Last_Name':
        case 'Gender':
        case 'Status':
            listAllEOIs($conn, $selectedOption);
            break;
        default:
            echo "<p class='error-message'>Invalid sorting option selected.</p>";
            break;
    }
}
}


    // List EOIs for a particular position (given a job reference number)
    function listEOIsForPosition($conn, $jobReference)
    {
        $jobReference = sanitizeInput($jobReference);
        $sql = "SELECT * FROM EOI WHERE Job_Reference = '$jobReference'";
        $result = $conn->query($sql);
        // Display the results
        if ($result->num_rows > 0) {
            echo "<h2>EOIs for Job Reference: $jobReference</h2>";
            echo "<table>";
            echo "<tr><th>EOInumber</th><th>Job Reference</th><th>First Name</th><th>Last Name</th><th>Status</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["EOInumber"] . "</td><td>" . $row["Job_Reference"] . "</td><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["status"] . "</td></tr>";
            }
            echo "</table>";
            echo "<p class='success-message'>EOIs for position $jobReference listed successfully.</p>";
        } else {
            echo "<p class='error-message'>No EOIs found for position $jobReference.</p>";
        }
    }
    // List EOIs for a particular applicant given their first name, last name, or both
