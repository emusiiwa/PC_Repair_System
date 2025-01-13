<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling\functions.css">
    <link rel="icon" type="image/x-icon" href="Images\favicon.ico">
    <title>PCRepairs</title>
</head>


<?php
require_once("config.php");

$id = $_REQUEST['id'];

$conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

$query = "SELECT * from customers where Customer_ID = '$id'";
$result = mysqli_query($conn, $query) or die("Could not execute query!");
$row = mysqli_fetch_array($result);


mysqli_close($conn);
?>

<body>
    <section id="heading">PC Repairs</section>

    <section class="header">
        <nav>
            <a href="index.html"><img src="Images\PCRepairs logo.png" alt="logo"></a>

            <div class="nav-links">
                <?php
                echo "<ul>";

                echo "<li><a href=\"addDevice.php\">Add Device</a></li>";
                echo "<li><a href=\"manage.php\">Manage</a></li>";
                echo "<li><a href=\"#\">Schedule</a></li>";
                echo "<li><a href=\"reports.php\">Reports</a></li>";
                echo "<li><a href=\"index.html\">Exit</a></li>";

                echo "<ul>";
                ?>
            </div>
        </nav>
    </section>

    <section class="booking-form">
        <br><br>

        <form action="addDevice.php" method="post" enctype="multipart/form-data">

            <fieldset id="addPC">
                <legend><strong>ADD A NEW DEVICE</strong></legend>

                <label for="sNumber">Device Serial Number</label><br>
                <input type="number" name="sNumber" id="sNumber" size="32" required autofocus><br><br>


                <label for="devicename">Device Name</label><br>
                <input type="text" name="devicename" id="devicename" size="32" required><br><br>

                <label for="devicemodel">Model</label><br>
                <input type="text" name="devicemodel" id="devicemodel" size="32" required><br><br>

                <label for="fault">Device Fault</label><br>
                <textarea name="fault" id="fault" cols="33" rows="5"></textarea><br><br>

                <label for="Picture">Picture</label><br> <br>
                <input type="file" name="picture" id="picture"><br><br>

                <input type="hidden" name="id" id="id" value=" <?php echo $id; ?>">

                <input type="submit" name="add-device" value="Add Device"><br>
            </fieldset>

        </form>
        <br><br>
    </section>


    <?php
    
    if (isset($_REQUEST['add-device'])) {

        $SerialNum = $_REQUEST['sNumber'];
        $DeviceName = $_REQUEST['devicename'];
        $DeviceModel = $_REQUEST['devicemodel'];    
        $Fault = $_REQUEST['fault'];

        $Picture = time() . $_FILES['picture']['name'];
        $destination = "DeviceImages/".$Picture;
        move_uploaded_file($_FILES['picture']['tmp_name'], $destination);


        require_once("config.php");
        $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

        $query = "INSERT INTO devices(Serial_Number, Customer_ID, Device_Name, Model, Device_Fault, Device_Picture) 
              VALUE('$SerialNum', '$id', '$DeviceName', '$DeviceModel','$Fault', '$Picture')";
        $Results = mysqli_query($conn, $query) or die("Could not execute query!");

        $query1 = "INSERT INTO repair_job (Serial_Number)
              VALUE('$SerialNum')";
        $Results1 = mysqli_query($conn, $query1) or die("Could not execute query!");



        mysqli_close($conn);

        echo "<a strong style=\"color: Blue;\">The new device was added!</strong a>";
    }

    ?>


    <section class="footer">
        <h4>About Us</h4>
        <p>You can find us at: 3147 Prince Alfred St, Grahamstown, Makhanda, 6139 <br>
            © 2022 PC Repairs. All Rights Reserved. Proudly created by Team 6</p>
    </section>


</body>

</html>