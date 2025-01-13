<?php
//include auth_session.php file on all user panel pages
include("auth_staff.php");
?>
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
table,
tr {
    border-collapse: collapse;
    width: 100%;
}

tr {
    text-align: left;
    padding: 8px;
    font-size: 18px;
}

tr:nth-child(even) {
    background-color: lightgray;
}
</style>

<body>
    <main>
        <section>

            <section id="heading">PC Repair</section>
            <section class="header">
                <nav>
                    <a href="index.html"><img src="styling\Images\PCRepairs logo.png" alt="logo"></a>
                    <div class="nav-links">
                        <ul>
                            <h2>Jobs Not Started</h2>
                            <li><a href=Reports.php>Reports</a></li>
                            <li><a href=logout.php>Exit</a></li>
                        </ul>
                    </div>
                </nav>
            </section>
        </section>

        <br><br><br>


        <section>

            <?php

            require_once("config.php");
            $conn = mysqli_connect(Servername, Username, Password, Database) or die("<p style=\"color: red;\"> Error: unable to connect to database!</p>");

            $query = "SELECT  repair_job.Job_ID,  repair_job.Serial_Number,  repair_job.Job_Status, devices.Device_Name, devices.Model, devices.Device_Fault
                        FROM repair_job JOIN devices ON repair_job.Serial_Number = devices.Serial_Number
                            WHERE repair_job.Job_Status = 'not Started'";

            $results = mysqli_query($conn, $query) or die("<p style=\"color: red;\"> Error! Could not retrieve the needed information!</p>");
            $row = mysqli_fetch_array($results);


            echo "<table width=\"80%\" border=0>
            <tr bgcolor=\"#00FFFF\">
            <td>Device Name</td>
            <td>Model</td>
            <td>Serial Number</td>
            <td>Fault</td>
            <td>Status</td>
            
            </tr>";




            while ($row = mysqli_fetch_array($results)) {
                echo "<tr>";
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

        <br><br><br><br><br><br>

        <section class="footer">
            <h4>About Us</h4>
            <p>You can find us at: 3147 Prince Alfred St, Grahamstown, Makhanda, 6139 <br>
                © 2022 PC Repairs. All Rights Reserved. Proudly created by Team 6</p>
        </section>

    </main>
</body>

</html>