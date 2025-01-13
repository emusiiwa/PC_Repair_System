<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling\functions.css">
    <link rel="icon" type="image/x-icon" href="styling\Images\favicon.ico">
    <title>PCRepairs</title>
</head>

<body>

    <?php

    require_once('config.php');

    $sNum = $_REQUEST['Serial_Number'];

    $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

    $query = "SET foreign_key_checks=0";
    $results = mysqli_query($conn,$query) or die("Could not execute query!");

    $query1 = "DELETE FROM team6.devices WHERE Serial_Number = '$sNum' limit 1";
    $results1 = mysqli_query($conn,$query1) or die("Error could not delete device");

    $query2 ="SET foreign_key_checks=1";  
    $result2 = mysqli_query($conn, $query2) or die("Could not execute query!");

    mysqli_close($conn);

    header("Location: Dashboard.php");

    ?>
</body>

</html>