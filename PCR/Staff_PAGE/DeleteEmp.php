<?php

    $Emp_ID = $_REQUEST['id'];

    require_once("config.php");

    $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");
   
    $query = "SET foreign_key_checks=0";
    $results = mysqli_query($conn,$query) or die("Could not execute query!");

    $query = "DELETE FROM team6.employees WHERE Employee_ID ='$Emp_ID' limit 1";
    $result = mysqli_query($conn, $query) or die("Could not Delet Employee!!!");

    $query2 ="SET foreign_key_checks=1";         
    $results2 = mysqli_query($conn,$query2) or die("Could not execute query!");

    mysqli_close($conn);

    header("Location: ShowEmp.php");

?>