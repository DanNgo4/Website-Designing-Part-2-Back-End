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
        <input type="submit" value="List All EOIs">
    </form>
    <hr>
    <h2>List EOIs For A Particular Position</h2>
    <form action="manage.php" method="GET" class="position-form">
        <input type="hidden" name="action" value="list_by_position">
        <label for="Job_Reference">Job Reference:</label>
        <input type="text" name="Job_Reference" id="Job_Reference">
        <input type="submit" value="SUBMIT">
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
        <input type="submit" value="SUBMIT">
    </form>
    <hr>
    <h2>Delete EOIs With A Specified Job Reference Number</h2>
    <form action="manage.php" method="GET">
        <input type="hidden" name="action" value="delete_by_position">
        <label for="Job_Reference_delete">Job Reference:</label>
        <input type="text" name="Job_Reference" id="Job_Reference_delete">
        <input type="submit" value="DELETE">
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
        <input type="submit" value="CHANGE">
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
            echo "<tr><td>" . $row["EOInumber"] . "</td><td>" . $row["Job_Reference"] . "</td><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Status"] . "</td></tr>";
        }
        echo "</table>";
        echo "<p class='success-message'>EOIs listed successfully.</p>";
    } else {
        echo "<p class='error-message'>No EOIs found.</p>";
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
    function listEOIsForApplicant($conn, $firstName, $lastName)
    {
        $firstName = sanitizeInput($firstName);
        $lastName = sanitizeInput($lastName);

        $sql = "SELECT * FROM EOI WHERE First_Name LIKE '%$firstName%' AND Last_Name LIKE '%$lastName%'";
        $result = $conn->query($sql);

        // Display the results
        if ($result->num_rows > 0) {
            echo "<h2>EOIs for Applicant: $firstName $lastName</h2>";
            echo "<table>";
            echo "<tr><th>EOInumber</th><th>Job Reference</th><th>First Name</th><th>Last Name</th><th>Status</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["EOInumber"] . "</td><td>" . $row["Job_Reference"] . "</td><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["status"] . "</td></tr>";
            }
            echo "</table>";
            echo "<p>EOIs for applicant $firstName $lastName listed successfully.</p>";
        } else {
            echo "<p>No EOIs found for applicant $firstName $lastName.</p>";
        }
    }

    // Delete all EOIs with a specified job reference number
    function deleteEOIsWithJobReference($conn, $jobReference)
    {
        $jobReference = sanitizeInput($jobReference);
        $sql = "DELETE FROM EOI WHERE Job_Reference = '$jobReference'";
        $result = $conn->query($sql);
        if($result) {
            echo "<p class='success-message'>EOIs for position $jobReference deleted successfully.</p>";
        } else {
            echo "<p class='error-message'>Failed to delete EOIs for position $jobReference.</p>";
        }
    }
    // Change the Status of an EOI
    function changeEOIStatus($conn, $EOinumber, $Status)
    {
        $EOInumber = sanitizeInput($EOInumber);
        $Status = sanitizeInput($Status);

        $sql = "UPDATE EOI SET status = '$Status' WHERE EOInumber = $EOInumber";
        $result = $conn->query($sql);

        if ($result) {
            echo "<p class='success-message'>EOI status changed successfully.</p>";
        } else {
            echo "<p class='error-message'>Failed to change EOI status.</p>";
        }
    }
    // Check the requested action and execute the appropriate query
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'list_all':
                $sortField = isset($_GET['sort_field']) ? $_GET['sort_field'] : 'EOInumber';
                listAllEOIs($conn, $sortField);
                break;
            case 'list_by_position':
                $jobReference = isset($GET['jobReference']) ? $_GET['jobReference'] : '';
                listEOIsByPosition($conn, $jobReference);
                break;
                case 'list_by_applicant':
                    $firstName = isset($_GET['firstName']) ? $_GET['firstName'] : '';
                    $lastName = isset($_GET['lastName']) ? $_GET['lastName'] : '';
                    listEOIsForApplicant($conn, $firstName, $lastName);
                    break;                
                case 'delete_by_position':
                    $jobReference = isset($_GET['jobReference']) ? $_GET['jobReference'] : '';
                    deleteEOIsByPosition($conn, $jobReference);
                    break;
                case 'change_status':
                    $EOInumber = isset($_GET['EOInumber']) ? $_GET['EOInumer'] : '';
                    $Status = isset($_GET['Status']) ? $_GET['Status'] : '';
                    changeEOIStatus($conn, $EOInumber, $Status);
                    break;
                default:
                    echo "<p class='error-message'>Invalid action.</p>";
                    break;
            }
        }
    
    // Close the database connection
    $conn->close();
?>
<a href = "logout.php"><h1>LOGOUT</h1></a>
</body>
</html>
<?php 
 } else{
     header("Location: phpenhancements.php?error");
     exit();
}
include 'Footer.inc';
 ?>