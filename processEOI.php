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

// This function ensures All data should be sanitized to remove leading and trailing spaces, backslashes and HTML control characters. 
function sanitise_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


// Connect to the database
require_once ("settings.php");

    $conn = @mysqli_connect($host,
    $user,
    $pwd,
    $sql_db
);
 // Check connection,if failed;displays an Error message
 if (!$conn) {
  echo "<p>Database connection failure</p>";
  }


  // Validate and sanitize form inputs
 
    if (isset($_POST["Job_Reference"])) {
        $Job_Reference = sanitise_input($_POST["Job_Reference"]);
    } else {
        header("location: apply.php");
        exit;
    }

    if (isset($_POST["First_Name"])) {
      $First_Name = sanitise_input($_POST["First_Name"]);
  } else {
      header("location: apply.php");
      exit;
  }

  if (isset($_POST["Last_Name"])) {
    $Last_Name = sanitise_input($_POST["Last_Name"]);
} else {
    header("location: apply.php");
    exit;
}

if (isset($_POST["dob"])) {
  $dob = sanitise_input($_POST["dob"]);
} else {
  header("location: apply.php");
  exit;
}

if (isset($_POST["Gender"])) {
  $Gender = sanitise_input($_POST["Gender"]);
} else {
  header("location: apply.php");
  exit;
}

if (isset($_POST["Street_Address"])) {
  $Street_Address = sanitise_input($_POST["Street_Address"]);
} else {
  header("location: apply.php");
  exit;
}

if (isset($_POST["Suburb_Town"])) {
$Suburb_Town = sanitise_input($_POST["Suburb_Town"]);
} else {
  header("location: apply.php");
  exit;
}

if (isset($_POST["State"])) {
  $State = sanitise_input($_POST["State"]);
} else {
  header("location: apply.php");
  exit;
}

if (isset($_POST["Postcode"])) {
  $Postcode = sanitise_input($_POST["Postcode"]);
} else {
  header("location: apply.php");
  exit;
}

if (isset($_POST["Email_Address"])) {
  $Email_Address = sanitise_input($_POST["Email_Address"]);
} else {
  header("location: apply.php");
  exit;
}

if (isset($_POST["Phone_Number"])) {
  $Phone_Number = sanitise_input($_POST["Phone_Number"]);
} else {
  header("location: apply.php");
  exit;
}

if (isset($_POST["OtherSkills"])) {
  $OtherSkills = sanitise_input($_POST["OtherSkills"]);
} else {
  header("location: apply.php");
  exit;
}

$Job_Reference = sanitise_input($Job_Reference);
$First_Name = sanitise_input($First_Name);
$Last_Name = sanitise_input($Last_Name);
$dob = sanitise_input($dob);
$Gender = sanitise_input($Gender);
$Street_Address= sanitise_input($Street_Address);
$Suburb_Town = sanitise_input($Suburb_Town);
$State= sanitise_input($State);
$Postcode = sanitise_input($Postcode);
$Email_Address = sanitise_input($Email_Address);
$Phone_Number = sanitise_input($Phone_Number);
$OtherSkills = sanitise_input($OtherSkills);

// Make sure all the required fields are filled otherwise displays error message
$errMsg = "";
   if (empty($Job_Reference)) {
    $errMsg .= "<p>You must enter job reference number.</p>";
} elseif (!preg_match("/^[a-zA-Z0-9]{5}$/", $Job_Reference)) {
    $errMsg .= "<p>Only five alphanumeric characters allowed in job reference number.</p>";
}

$errMsg = "";
   if (empty($First_Name)) {
    $errMsg .= "<p>You must enter your first name.</p>";
} elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $First_Name)) {
    $errMsg .= "<p>Only 20 alpha letters allowed in your first name.</p>";
}
  
$errMsg = "";
   if (empty($Last_Name)) {
    $errMsg .= "<p>You must enter your last name.</p>";
} elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $Last_Name)) {
    $errMsg .= "<p>Only 20 alpha letters allowed in your first name.</p>";
}

$errMsg = "";
if (empty($dob)) {
    $errMsg .= "<p>You must enter your date of birth.</p>";
} else {
    $dobDateTime = DateTime::createFromFormat('Y-m-d', $dob);
    if (!$dobDateTime) {
        $errMsg .= "<p>You must enter the date of birth in the correct format: YYYY-MM-DD.</p>";
    } else {
        $now = new DateTime();
        $age = $now->diff($dobDateTime)->y;
        if ($age < 15 || $age > 80) {
            $errMsg .= "<p>Your age must be between 15 and 80 years.</p>";
        }
    }
}

if (empty($Gender)) {
  $errors[] = "Gender is required.";
} else {
  // Radio input has a value, you can proceed with further processing
  $selectedGender = $_POST['Gender'];
  }

$errMsg = "";
   if (empty($Street_Address)) {
    $errMsg .= "<p>You must enter your Street address.</p>";
} elseif (!preg_match("/^[a-zA-Z]{1,40}$/", $Street_Address)) {
    $errMsg .= "<p>Only 40 alpha letters allowed in your Street address.</p>";
}

$errMsg = "";
   if (empty($Suburb_Town))) {
    $errMsg .= "<p>You must enter your suburb or town.</p>";
} elseif (!preg_match("/^[a-zA-Z]{1,40}$/", $Suburb_Town)) {
    $errMsg .= "<p>Only 40 alpha letters allowed in suburb or town .</p>";
}


  
// Create the EOI table if it doesn't exist
  $create_table_query = "CREATE TABLE IF NOT EXISTS EOI (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Job_Reference VARCHAR(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    First_Name VARCHAR(20) NOT NULL,
    Last_Name VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    Street_Address VARCHAR(40) NOT NULL,
    Suburb_Town_Town VARCHAR(40) NOT NULL,
    State VARCHAR(3) NOT NULL,
    Postcode VARCHAR(4) NOT NULL,
    Email_Address VARCHAR(255) NOT NULL,
    Phone_Number VARCHAR(12),
    OtherSkills TEXT,
    UNIQUE KEY(Job_Reference)
  )";
  $conn->query($create_table_query);

  // Insert the EOI record into the table
  $insert_query = "INSERT INTO EOI (Job_Reference, first_name, last_name, dob, Gender, Street_Address, Suburb_Town, State , Postcode, Email_Address, Phone_Number, OtherSkills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($insert_query);
  $stmt->bind_param("ssssssssssss", $_POST["Job_Reference"], $_POST["first_name"], $_POST["last_name"], $_POST["dob"], $_POST["Gender"], $_POST["Street_Address"], $_POST["Suburb_Town"], $_POST["State"], $_POST["Postcode"], $_POST["Email_Address"], $_POST["Phone_Number"], $_POST["OtherSkills"]);

  if ($stmt->execute()) {
    // Retrieve the auto-generated EOInumber
    $eoi_number = $stmt->insert_id;
  }
?>
</body>
</html>