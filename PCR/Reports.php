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
}

tr:nth-child(even) {
    background-color: lightgrey;
}



.dropbtn {
    background-color: #0489aa;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: cyan;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: grey;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: black;
}
</style>

<body>
    <main>
<?php
echo "hey there"; 
?>
        <section>

            <section id="heading">PC Repair</section>
            <section class="header">
                <nav>
                    <a href="index.html"><img src="styling\Images\PCRepairs logo.png" alt="logo"></a>

                    <div class="nav-links">

                        <ul>
                            <h2>Business Insites</h2>
                            <?php $Emp_ID = $_REQUEST['id']; ?>
                    
                            <li><a href=logout.php>Exit</a></li>
                        </ul>

                    </div>
                </nav>
            </section>

        </section>

        <section>
            <!-- <form action="Reports.php" method="post"><br>
        <input type="submit" name= 'submit' value="Not Complete"> 
        <input type="submit" name= 'submit' value="Complete">
        <input type="submit" name= 'submit' value="Cancelled">
        <input type="submit" name= 'submit' value= 'In Process'>
    </form> -->







            <h2>Generate Reports</h2><br>
            <p><em>Select the report you would like to generate and see</em></p><br>

            <div class="dropdown">
                <button class="dropbtn">Status of Jobs</button>
                <div class="dropdown-content" style="left:0;">
                    <a href="reports\notstarted.php">Not Started</a>
                    <a href="reports\inprogress.php">In Progress</a>
                    <a href="reports\complete.php">Complete</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Parts</button>
                <div class="dropdown-content" style="left:0;">
                    <a href="reports\partsordered.php">Parts Ordered</a>
                    <a href="reports\stock.php">Parts On-hand</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Repairs</button>
                <div class="dropdown-content" style="left:0;">
                    <a href="reports\repaircosts.php">Repair Costs</a>
                    <a href="reports\devicehistory.php">Device Repair History</a>
                </div>
            </div>



        </section>

        <br><br><br><br>
        <?php
        /* if (isset($_REQUEST['submit'])) {
            require_once("config.php");
            $conn = mysqli_connect(Servername, Username, Password, Database) or die("<p style=\"color: red;\"> Error: unable to connect to database!</p>");

            $Button = "";

            if ($_REQUEST['submit'] == 'Not Complete') {
                $query = "SELECT * FROM repair_job WHERE Status = 'Not Complete' AND ";
                $query = "SELECT * FROM devices WHERE Serial_Number = 'Not Complete'";

                $Button = "Not Complete";
            } elseif ($_REQUEST['submit'] == 'Complete') {
                $query = "SELECT * FROM repair_job WHERE Status = 'Complete'";
                $Button = "Complete";
            } elseif ($_REQUEST['submit'] == 'Cancelled') {
                $query = "SELECT * FROM repair_job WHERE Status = 'Cancelled'";
                $Button = "Cancelled";
            } elseif ($_REQUEST['submit'] == 'In Process') {
                $query = "SELECT * FROM repair_job WHERE Status = 'In Progress'";
                $Button = "In Process";
            }

            echo "<h4>$Button</h4>";

            $Results = mysqli_query($conn, $query) or die("<p style=\"color: red;\">Error: Could not execute query!</p>");

            echo "<table style=\"width: 80%;\">
                <tr style=\"#00FFFF\">
                    <th>Job Number</th>
                    <th>Status</th>
                    <th>Assigned Employee</th>
                    <th>Cost</th>
                </tr>";

            while ($row = mysqli_fetch_array($Results)) {
                echo "<tr>";
                echo "<td>" . $row['Job_ID'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_close($conn);
        }


 */
        ?>
        </section>
        <section class="footer">
            <h4>About Us</h4>
            <p>You can find us at: 3147 Prince Alfred St, Grahamstown, Makhanda, 6139 <br>
                © 2022 PC Repairs. All Rights Reserved. Proudly created by Team 6</p>
        </section>

    </main>
</body>

</html