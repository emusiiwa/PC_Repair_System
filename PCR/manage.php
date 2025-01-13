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
    <main>
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

       

        <?php
        if (isset($_REQUEST['login'])) {
            $usermail = $_REQUEST['uemail'];
        }

        ?>

        <section id="heading">PC Repairs</section>

        <section class="header">
            <nav>
                <a href="index.html"><img src="styling\Images\PCRepairs logo.png" alt="logo"></a>

                <div class="nav-links">
                    <?php
                    echo "<ul>";

                    //?id={$row['cus_ID']}

                    echo "<li><a href=\"manage.php\">Manage</a></li>";
                    echo "<li><a href=\"addDevice.php\">Add Device</a></li>";
                    echo "<li><a href=\"#\">Schedule</a></li>";
                    echo "<li><a href=\"reports.php\">Reports</a></li>";
                    echo "<li><a href=\"index.html\">Exit</a></li>";

                    echo "<ul>";
                    ?>
                </div>
            </nav>
        </section>


        <section id="manage">

            <?php
            $usermail =  $_SESSION["user"];
            require_once("config.php");
            $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

            $query = "SELECT Customer_ID, Fname,Lname from customers where Email = '$usermail'";
            $results = mysqli_query($conn, $query) or die("Could not execute query!");
            while ($row = mysqli_fetch_array($results)) {
                echo "<h1> Welcome " . $row['Fname'] . " " . $row['Lname'] . "</h1>";
                $cus_ID = $row['Customer_ID'];
            }

            $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

            $query = "SELECT devices.Serial_Number, devices.Customer_ID, devices.Device_Name, devices.Model, devices.Device_Fault, devices.Device_Picture, repair_job.Job_Status 
            FROM devices join repair_job on devices.Serial_Number = repair_job.Serial_Number
            WHERE '$cus_ID' = devices.Customer_ID";

            $result = mysqli_query($conn, $query) or die("Could not execute query!2");

            echo "<table width=\"80%\" border=0>
            <tr bgcolor=\"#00FFFF\">

            <td>Device Picture</td>
            <td>Name</td>
            <td>Model</td>
            <td>Serial Number</td>
            <td>Fault</td>
            <td>Repair Status</td>
            
            </tr>";

            // filling table with database info
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";

                echo "<td>" . "<img src=\"DeviceImages/" . $row['Device_Picture'] . "\">" . "</td>";
                echo "<td>" . $row['Device_Name'] . "</td>";
                echo "<td>" . $row['Model'] . "</td>";
                echo "<td>" . $row['Serial_Number'] . "</td>";
                echo "<td>" . $row['Device_Fault'] . "</td>";
                echo "<td>" . $row['Job_Status'] . "</td>";

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