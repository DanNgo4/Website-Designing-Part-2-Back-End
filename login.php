<?php
session_start();
    // Database connection
    include ("settings.php");
    //Checks if connection is successful
    $conn = @mysqli_connect($host,$user, $pwd, $sql_db);
    $table = "managers";
    if (!$conn) {
        //displays an error message 
        echo "<p>Database connection failed</p>";
    }
    else {
        // Manager login validation
        if ((isset($_POST["name"])) and (isset($_POST["pwd"]))) {
            function sanitizeInput($input) {
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }
            $name = sanitizeInput($_POST["name"]);
            $pwd  = sanitizeInput($_POST["pwd"]);
            $sql = "SELECT * FROM $table WHERE namee = '$name' AND passwordd = '$pwd'";
            $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row["namee"] === $name and $row["passwordd"] === $pwd) {
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["name"] = $row["namee"];
                        header("Location: manage.php");
                        exit();
                    }
                    else {
                        header("Location: phpenhancements.php?error=Incorrect name or password");
                        exit();
                    }

                }
                else {
                    header("Location: phpenhancements.php?error=Incorrect name or password");
                    exit();
                }

        }
        else {
            header("Location: phpenhancements.php?error");
            exit();
        }
    }
?>