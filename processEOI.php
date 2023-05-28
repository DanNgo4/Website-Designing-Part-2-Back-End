<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>processEOI</title>
</head>
<body>
    <?php
    // Server-side validation and processing

    // This function ensures all data should be sanitized to remove leading and trailing spaces, backslashes, and HTML control characters.
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Connect to the database
    require_once("settings.php");

    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );
    // Check connection; if failed, display an error message
    if (!$conn) {
        echo "<p>Database connection failure</p>";
    }


    // Validate and sanitize form inputs

    $errMsg = ""; // Added variable to store error messages

    if (isset($_POST["Job_Reference"])) {
        $Job_Reference = sanitise_input($_POST["Job_Reference"]);
    } else {
        echo "Invalid Job reference number";
        exit;
    }

    // ... Rest of the validation and sanitization for other form fields ...

    if (empty($OtherSkills)) {
        $errMsg .= "<p>You must enter Other Skills.</p>";
    }


    // Create the EOI table if it doesn't exist
    $create_table_query = "CREATE TABLE IF NOT EXISTS EOI (
        `EOInumber` INT AUTO_INCREMENT PRIMARY KEY,
        'Job_Reference' VARCHAR(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
        'First_Name' VARCHAR(20) NOT NULL,
        'Last_Name' VARCHAR(20) NOT NULL,
        'dob' DATE NOT NULL,
        'Gender' VARCHAR(10) NOT NULL,
        'Street_Address' VARCHAR(40) NOT NULL,
        'Suburb_Town' VARCHAR(40) NOT NULL,
        'State' VARCHAR(3) NOT NULL,
        'Postcode' VARCHAR(4) NOT NULL,
        'Email_Address' VARCHAR(255) NOT NULL,
        'Phone_Number' VARCHAR(12),
        'OtherSkills' TEXT,
        UNIQUE KEY(Job_Reference)
    )";
    $conn->query($create_table_query);

    // Insert the EOI record into the table
    $insert_query = "INSERT INTO EOI (Job_Reference, First_Name, Last_Name, dob, Gender, Street_Address, Suburb_Town, State, Postcode, Email_Address, Phone_Number, OtherSkills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);

    $stmt->bind_param("ssssssssssss", $Job_Reference, $First_Name, $Last_Name, $dob, $Gender, $Street_Address, $Suburb_Town, $State, $Postcode, $Email_Address, $Phone_Number, $OtherSkills);

    if ($stmt->execute()) {
        // Retrieve the auto-generated EOInumber
        $eoi_number = $conn->insert_id;
    }

    ?>

    <!-- Display success message and EOI number -->
    <?php if (empty($errMsg)) : ?>
        <h1>Success!</h1>
        <p>Your Expression of Interest has been submitted.</p>
        <p>Your EOI number is: <?php echo $eoi_number; ?></p>
    <?php else : ?>
        <!-- Display error message -->
        <h1>Error!</h1>
        <?php echo $errMsg; ?>
    <?php endif;
    mysqli_close($conn);
    ?>
</body>
</html>
