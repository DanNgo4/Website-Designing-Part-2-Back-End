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
    include 'Header.inc'
?>
    <form action = "manage.php" method = "POST">
        <h1>Welcome Manager</h1>
        <label>Name</label>
    </form>
<?php
    include 'Footer.inc'
?>
</body>    
</html>