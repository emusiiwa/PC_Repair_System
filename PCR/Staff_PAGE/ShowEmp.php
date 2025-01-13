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
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid black;
  padding: 8px;
}

table tr:nth-child(0){background-color: rgba(50,115,220,0.3);} 

table tr:hover {background-color: cyan;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

<body>

<section id="heading">PC Repairs</section>

    <section class="header">
        <nav>
            <a href="index.html"><img src="styling\Images\PCRepairs logo.png" alt="logo"></a>

            <div class="nav-links">
                <?php
                echo "<ul>";
              
              //  echo "<li><a href=\"newEmp.php\">Employees</a></li>";
              //  echo "<li><a href=\"reports.php\">Reports</a></li>";
                echo "<li><a href=\"Dashboard.php\">Back</a></li>";
                echo "<li><a href=\"index.html\">Exit</a></li>";

                echo "<ul>";
                ?>
            </div>
        </nav>
    </section>
<?php
require_once("config.php");
 $conn = mysqli_connect(Servername,Username,Password,Database) or die("Could not connect to database!");

 $query = "SELECT * FROM employees"; 
 $result = mysqli_query($conn, $query) or die("Could not execute query!");

 echo "<table width=\"80%\" border=0>
 <tr bgcolor=\"#00FFFF\">

 <td>Employee ID</td>
 <td>Name</td>
 <td>Surname</td>
 <td>Contact</td>
 <td>Email</td>
 <td>JobTitle</td>
 <td>Delete</td>
 
 </tr>";


 while ($row = mysqli_fetch_array($result)) {
     
     echo "<tr>";
     echo "<td>" . $row['Employee_ID'] . "</td>";
     echo "<td>" . $row['Fname'] . "</td>";
     echo "<td>" . $row['Lname'] . "</td>";
     echo "<td>" . $row['Contact_Num'] . "</td>";
     echo "<td>" . $row['Email'] . "</td>";
     echo "<td>" . $row['JobTitle'] . "</td>";
     $name = strtoupper($row['Fname'].' '.$row['Lname']) ;
     echo "<td><a href=\"DeleteEmp.php?id={$row['Employee_ID']}\"" .
         "onclick=\"return confirm('Are you sure you want to delete: $name')\"><input type=\"button\" value=\"Delete\"></a></td>";
     echo "</tr>";
 }

 echo "</table>";

 mysqli_close($conn);

?>

<section class="footer">
            <h4>About Us</h4>
            <p>You can find us at: 3147 Prince Alfred St, Grahamstown, Makhanda, 6139 <br>
                © 2022 PC Repairs. All Rights Reserved. Proudly created by Team 6</p>
        </section>

        </body>


</html>