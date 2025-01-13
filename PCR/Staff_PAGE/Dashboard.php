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
    <main>
        <section id="heading">PC Repair</section>


        <section class="header">
            <nav>
                <a href="index.html"><img src="styling\Images\PCRepairs logo.png" alt="logo"></a>

                <div class="nav-links">

                    <ul>
                        <h2>Work environment</h2>
                        <?php
                        require_once("config.php");
                        
                        $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

                        $query = "SELECT id_emp from tech_user where tech_email = '$User'";
                        $results = mysqli_query($conn, $query) or die("Could not execute query!");
                        while ($row = mysqli_fetch_array($results)) {
                            $Emp_ID = $row['id_emp'];
                        }

                        ?>
                       

                        <li><a href="Reports.php?id=<?php echo "$Emp_ID"; ?>">Reports</a></li>
                        <li><a href=newEmp.php>Employees</a></li>
                        <li><a href=logout.php>Exit</a></li>
                    </ul>

                </div>
            </nav>
        </section>

        <section id="Dashboard">

            <?php
            
            require_once("config.php");
            $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

            $query = "SELECT Employee_ID, Fname,Lname, JobTitle from employees where Email = '$usermail'";
            $results = mysqli_query($conn, $query) or die("Could not execute query!");
            $row = mysqli_fetch_array($results);
                echo "<h1>" . $row['Fname'] . " " . $row['Lname'] . "</h1>";
                echo "<h4> Logged in as : " . $row['JobTitle'] . "</h4>";
                echo "<strong>JOB QUE</strong>";
                $Emp_ID = $row['Employee_ID'];
            

            $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

            $query = "SELECT devices.Serial_Number, devices.Customer_ID, devices.Device_Name, devices.Model, devices.Device_Fault, devices.Device_Picture, repair_job.Job_ID,repair_job.Job_Status 
            FROM devices join repair_job on devices.Serial_Number = repair_job.Serial_Number";

            $result = mysqli_query($conn, $query) or die("Could not execute query!2");

            echo "<table width=\"80%\" border=0>
            <tr bgcolor=\"#00FFFF\">

            <td>Customer ID</td>
            <td>Name</td>
            <td>Model</td>
            <td>Serial Number</td>
            <td>Fault</td>
            <td>Repair Status</td>
            <td></td>
            <td></td>
            
            
            </tr>";

            // filling table with database info
            while ($row = mysqli_fetch_array($result)) {
                $device = $row['Device_Name'] . " " . $row['Model'];

                echo "<tr>";
                echo "<td>" . $row['Customer_ID'] . "</td>";
                echo "<td>" . $row['Device_Name'] . "</td>";
                echo "<td>" . $row['Model'] . "</td>";
                echo "<td>" . $row['Serial_Number'] . "</td>";
                echo "<td>" . $row['Device_Fault'] . "</td>";
                echo "<td>" . $row['Job_Status'] . "</td>";
                echo "<td><a href=\"Update.php?id={$row['Job_ID']}&serial={$row['Serial_Number']}\"><input type=\"button\" value=\"Update\"></a></td>";
                echo "<td><a href=\"Delete.php?id={$row['Serial_Number']}\"" .
                    "onclick=\"return confirm('Are you sure you want to delete: $device')\"><input type=\"button\" value=\"Delete\"></a></td>";
                echo "</tr>";
            }

            echo "</table>";

            mysqli_close($conn);

            ?>

        </section>



        <section class="footer">
            <h4>About Us</h4>
            <p>You can find us at: 3147 Prince Alfred St, Grahamstown, Makhanda, 6139 <br>
                © 2022 PC Repairs. All Rights Reserved. Proudly created by Team 6</p>
        </section>

    </main>

</body>


</html>