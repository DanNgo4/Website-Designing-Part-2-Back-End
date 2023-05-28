<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="utf-8" />
    <meta name = "description" content = "SOE Manager Login" />
    <meta name = "keywords"    content = "PHP, MySQL, SOE, Manager" />        
    <meta name = "author"      content = "Dan Ngo" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/x-icon" href="images/soe_logo_transparent_small.png">
    <title>Manager Login</title>
</head>
<body>
<?php
    session_start();
    include ("Header.inc");
    // Database connection
    require("settings.php");
    //Checks if connection is successful
    if (!$conn) {
        //displays an error message 
        echo "<p>Database connection failure</p>";
    } 

    // Manager login validation
    if ((isset($_POST["name"])) and (isset($POST["pwd"]))) {
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
            $res = @mysqli_query($conn, $sql);

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
    <form action = "phpenhancements.php" method = "POST">
        <h1>Welcome Manager</h1>
            <label>Name</label>
            <input type = "text" name = "name" placeholder="User Name"></br>

            <label>Password</label>
            <input type = "password" name = "pwd" placeholder = "Password"></br>

            <button type = "submit">Login</button>
    </form>
<?php
    include 'Footer.inc'
?>
</body>    
</html>