<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>processEOI.php</title>
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
 
    if (isset($_POST["job_reference"])) {
        $job_reference = sanitise_input($_POST["job_reference"]);
    } else {
        header("location: apply.html");
        exit;
    }

    if (isset($_POST["firstname"])) {
      $firstname = sanitise_input($_POST["firstname"]);
  } else {
      header("location: apply.html");
      exit;
  }

  if (isset($_POST["lastname"])) {
    $lastname = sanitise_input($_POST["lastname"]);
} else {
    header("location: apply.html");
    exit;
}

if (isset($_POST["dob"])) {
  $dob = sanitise_input($_POST["dob"]);
} else {
  header("location: apply.html");
  exit;
}

if (isset($_POST["gender"])) {
  $gender = sanitise_input($_POST["gender"]);
} else {
  header("location: apply.html");
  exit;
}

if (isset($_POST["street_address"])) {
  $street_address = sanitise_input($_POST["street_address"]);
} else {
  header("location: apply.html");
  exit;
}

if (isset($_POST["suburb"])) {
$suburb = sanitise_input($_POST["suburb"]);
} else {
  header("location: apply.html");
  exit;
}

if (isset($_POST["state"])) {
  $state = sanitise_input($_POST["state"]);
} else {
  header("location: apply.html");
  exit;
}

if (isset($_POST["postcode"])) {
  $postcode = sanitise_input($_POST["postcode"]);
} else {
  header("location: apply.html");
  exit;
}

if (isset($_POST["email"])) {
  $email = sanitise_input($_POST["email"]);
} else {
  header("location: apply.html");
  exit;
}

if (isset($_POST["phone_number"])) {
  $phone_number = sanitise_input($_POST["phone_number"]);
} else {
  header("location: apply.html");
  exit;
}

if (isset($_POST["other_skills"])) {
  $other_skills = sanitise_input($_POST["other_skills"]);
} else {
  header("location: apply.html");
  exit;
}

$job_reference = sanitise_input($job_reference);
$firstname = sanitise_input($firstname);
$lastname = sanitise_input($lastname);
$dob = sanitise_input($dob);
$gender = sanitise_input($gender);
$street_address= sanitise_input($street_address);
$suburb = sanitise_input($suburb);
$state= sanitise_input($state);
$postcode = sanitise_input($postcode);
$email = sanitise_input($email);
$phone_number = sanitise_input($phone_number);
$other_skills = sanitise_input($other_skills);

// Make sure all the required fields are filled otherwise displays error message
$errMsg = "";
   if (empty($job_reference)) {
    $errMsg .= "<p>You must enter job reference number.</p>";
} elseif (!preg_match("/^[a-zA-Z0-9]{5}$/", $job_reference)) {
    $errMsg .= "<p>Only five alphanumeric characters allowed in job reference number.</p>";
}

$errMsg = "";
   if (empty($firstname)) {
    $errMsg .= "<p>You must enter your first name.</p>";
} elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $firstname)) {
    $errMsg .= "<p>Only 20 alpha letters allowed in your first name.</p>";
}
  
$errMsg = "";
   if (empty($lastname)) {
    $errMsg .= "<p>You must enter your last name.</p>";
} elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $lastname)) {
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




  
// Create the EOI table if it doesn't exist
  $create_table_query = "CREATE TABLE IF NOT EXISTS EOI (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_reference VARCHAR(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    street_address VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state VARCHAR(3) NOT NULL,
    postcode VARCHAR(4) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(12),
    other_skills TEXT,
    UNIQUE KEY(job_reference)
  )";
  $conn->query($create_table_query);

  // Insert the EOI record into the table
  $insert_query = "INSERT INTO EOI (job_reference, first_name, last_name, dob, gender, street_address, suburb, state , postcode, email, phone_number, other_skills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($insert_query);
  $stmt->bind_param("ssssssssssss", $_POST["job_reference"], $_POST["first_name"], $_POST["last_name"], $_POST["dob"], $_POST["gender"], $_POST["street_address"], $_POST["suburb"], $_POST["state"], $_POST["postcode"], $_POST["email"], $_POST["phone_number"], $_POST["other_skills"]);

  if ($stmt->execute()) {
    // Retrieve the auto-generated EOInumber
    $eoi_number = $stmt->insert_id
  }
</body>
</html>