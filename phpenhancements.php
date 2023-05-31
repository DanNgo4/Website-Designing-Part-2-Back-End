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
    include ("Header.inc");
?>
    <form action = "login.php" method = "post">
        <h1>Welcome Manager</h1>
<?php if (isset($_GET['error'])) {
    echo $_GET['error'] . "</br>";
}
?>
            <label>Name</label>
            <input type = "text" name = "name" placeholder = "User Name" required = "required"></br>

            <label>Password</label>
            <input type = "password" name = "pwd" placeholder = "Password" required = "required"></br>

            <button type = "submit">Login</button>
    </form>

    <p>Name: s104204262 </br> Password: 210503</p>
<?php
    include 'Footer.inc'
?>
</body>    
</html>