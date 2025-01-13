<!DOCTYPE html>
<html lang="en">
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

        <?php
        $Job = $_REQUEST['id'];
        ?>

        <section id="heading">PC Repair</section>

        <section class="header">
            <nav>
                <a href="index.html"><img src="styling\Images\PCRepairs logo.png" alt="logo"></a>

                <div class="nav-links">
                    <?php
                    require_once("config.php");
                    $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

                    echo " hello $Job";

                    $query = "SELECT * from repair_job where Job_ID = '$Job'";
                    $results = mysqli_query($conn, $query) or die("Could not execute query!");
                    // while ($row = mysqli_fetch_array($results)) {
                        $row = mysqli_fetch_array($results);
                        $status = $row['Job_Status'];
                        $serial = $row['Serial_Number'];
                        //echo $Job_status;
                        $query2 = "SELECT * from devices where Serial_Number = '$serial'";
                        $results2 = mysqli_query($conn, $query2) or die("Could not execute query!");

                        $row2 = mysqli_fetch_array($results2);

                        $Cust_ID = $row2['Customer_ID'];
                    // }


                    //echo $row2['Device_Name'];

                     mysqli_close($conn);
                    ?>
                </div>
            </nav>
        </section>

        <section id="Dashboard">

            <?php
            require_once("config.php");

            $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

            $query = "SELECT * FROM customers WHERE Customer_ID = '$Cust_ID'";
            $results = mysqli_query($conn, $query) or die("Could not execute query!!!");

            while ($row = mysqli_fetch_array($results)) {
                echo "<tr>";
                echo "<td><h2><strong> Now working on " . $row['Fname'] . " " . $row['Lname'] . "'s device</h2></strong></td><br><br>";
                echo "</tr>";
            }

            $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

            $query1 = "SELECT devices.Serial_Number, devices.Customer_ID, devices.Device_Name, devices.Model, devices.Device_Fault, devices.Device_Picture, repair_job.Job_ID,repair_job.Job_Status 
            FROM devices join repair_job on devices.Serial_Number = repair_job.Serial_Number";

            $results1 = mysqli_query($conn, $query1) or die("Could not execute query!2");

            $row1 = mysqli_fetch_array($results1);

            $name = $row1['Device_Name'];
            $sernum = $row1['Serial_Number'];


            echo $row2['Device_Name'] . " " . $row2['Model'] . $row1['Job_Status'] . "<br><br>";



            echo "<img src=\"DeviceImages/" . $row1['Device_Picture'] . "\"><br><br>";
            echo $row1['Device_Fault'] . "<br><br>";
            //echo $status;

            mysqli_close($conn);

            ?>

            <section class="booking-form">
                <br><br>

                <form action="Update.php" method="get" enctype="multipart/form-data">

                    <fieldset id="addPC">
                        <legend><strong>Update Details</strong></legend>

                        <label for="state">Status</label><br>
                        <input type="text" name="state" id="state" size="32" value="<?php echo $status; ?>"
                            required><br><br>
                        <!-- <select id="state" name="state">
                            <option name="state" value="// echo $status;
                                                        " selected>// echo $status;
                                                                        </option>
                            <option name="state" value="Not Complete">Not Complete</option>
                            <option name="state" value="In Progress">In Progress</option>
                            <option name="state" value="Completed">Complete</option>
                        </select><br><br> -->


                        <label for="parts">Parts Needed</label><br>
                        <input type="text" name="parts" id="parts" size="32" value="none" required><br><br>

                        <label for="price">Price</label><br>
                        <input type="number" name="price" id="price" size="32" value="0.00" required><br><br>

                        <input type="hidden" name="id" value="<?php echo $Job?>">

                        <input type="submit" name="update" value="Update Details"><br>

                    </fieldset>

                </form>
                <br><br>


            </section>


            <?php

            if (isset($_REQUEST['update'])) {

                $state = $_REQUEST['state'];
                $job= $_REQUEST['id'];
                

                require_once("config.php");

                $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");
                echo "$state $job";

                $query2 = "UPDATE repair_job SET Job_Status = '$state' WHERE Job_ID = '$job'";
                $results2 = mysqli_query($conn, $query2) or die("Could not execute query!!!2");

                header("Location: Dashboard.php");
                mysqli_close($conn);

                
            }
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