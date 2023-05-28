<?php
	$host   = "feenix-mariadb.swin.edu.au";
	$user   = "s104204262"; // your user name
	$pwd    = "210503"; // your password (date of birth ddmmyy unless changed)
	$sql_db = "s104204262_db"; // your database
    $conn   = @mysqli_connect ($host,
                               $user,
                               $pwd,
                               $sql_db
    );
?>