<?php
session_start();
    include ("Header.inc");
    // Database connection
    include ("settings.php");
    //Checks if connection is successful
    if (!$conn) {
        //displays an error message 
        echo "<p>Database connection failure</p>";
    } 

    // Manager login validation
    if ((isset($_POST["name"])) and (isset($POST["pwd"]))) {
        
        function sanitizeInput($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
}

        $name = sanitizeInput($_POST["name"]);
        $pwd  = sanitizeInput($_POST["pwd"]);

        if (empty($name)) {
            header("Location: phpenhancements.php?error=Name is required");
            exit();
        }
        elseif (empty($pwd)) {
            header("Location: phpenhancements.php?error=Password is required");
            exit();
        }
        else {
            $sql = "SELECT * FROM manager WHERE name = '$name' AND password = '$pwd'";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) === 1) {
                $row = mysqli_fetch_assoc($res);
                if ($row["name"] === $name and $row["password"] === $pwd) {
                    $SESSION["name"] = $row["name"];
                    $SESSION["name"] = $row["name"];
                    header("Location: manage.php");
                    exit();
                }
                else {
                    header("Location: phpenhancements.php?error=Incorrect name or password");
                    exit();
                }
            }
        }
    }
    else {
        header("Location: phpenhancements.php?error");
        exit();
    }
?>