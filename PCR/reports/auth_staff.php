<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION["staff"])) {
        header("Location: stafflogin.php");
        exit();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>auth</title>
</head>
<body> 
</body>
</html>