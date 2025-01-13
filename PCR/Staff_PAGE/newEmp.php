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

<section id="heading">PC Repairs</section>

    <section class="header">
        <nav>
            <a href="index.html"><img src="styling\Images\PCRepairs logo.png" alt="logo"></a>

            <div class="nav-links">
                <?php
                echo "<ul>";
              
              //  echo "<li><a href=\"newEmp.php\">Employees</a></li>";
                echo "<li><a href=\"ShowEmp.php\">Show employees</a></li>";
                echo "<li><a href=\"Dashboard.php\">Back</a></li>";
                echo "<li><a href=\"index.html\">Exit</a></li>";

                echo "<ul>";
                ?>
            </div>
        </nav>
    </section>



<section class="booking-form">
        <br><br>

        <form action="newEmp.php" method="post">

        <fieldset id="addEmp">
                <legend><strong>ADD A NEW EMPLOYEE</strong></legend>

    
<form action="newEmp.php" method="post">

<label for="fname">First Name</label><br>
<input type="text" name="fname" id="fname" size="32" required autofocus><br><br>


<label for="lname">Last Name</label><br>
<input type="text" name="lname" id="lname" size="32" required><br><br>

<label for="email">Email</label><br>
<input type="email" name="email" id="email" size="32" required><br><br>

<label for="contact">Contact Number</label><br>
<input type="number" name="contact" id="contact" size="32" required><br><br>

Job title <br><select id ="Jobtitle" name="JobTitle">
            <option value= "Technician">Technician</option>
            <option value= "Admin">Admin</option>
            <option value= "Manager">Manager</option>
          </select><br><br>
            

          <label for="tpwd">Password</label><br>
<input type="password" name="tpwd" id="tpwd" size="32" required><br><br>

            <input type="submit" name = "submit" value="Add Employee">

            </fieldset>
        </form>
        <br><br>
    </section>



</form>


<?php       
    if(isset($_REQUEST['submit']))
{ 
    $name = $_REQUEST['fname'];
    $surname = $_REQUEST['lname'];
    $mail = $_REQUEST['email'];
    $num = $_REQUEST['contact'];
    $title = $_REQUEST['JobTitle'];
    $tpwd = $_REQUEST['tpwd'];

    require_once("config.php");
    $conn = mysqli_connect(Servername,Username,Password,Database) or die("Could not connect to database!");

    $query = "INSERT INTO employees (Fname, Lname, Contact_Num, Email, JobTitle) VALUE ('$name', '$surname', '$num','$mail','$title');";
    $result = mysqli_query($conn, $query) or die("Could not execute query!");

    mysqli_close($conn);

    $conn1 = mysqli_connect(Servername,Username,Password,Database) or die("Could not connect to database!");
    $query1 = "SELECT * FROM employees WHERE  Email = '$mail'";
    $Results1 = mysqli_query($conn1, $query1) or die("Could not execute query!1");

    while($row = mysqli_fetch_array($Results1))
    {
        $emp_ID = $row['Employee_ID'];
    }
    mysqli_close($conn1);

    $SHA = sha1($tpwd);

    $conn2 = mysqli_connect(Servername,Username,Password,Database) or die("Could not connect to database!");

    $query2 = "INSERT INTO tech_user (tech_email, tech_pwd, id_emp)
            VALUE ('$mail', '$SHA', '$emp_ID')";
    $Results2 = mysqli_query($conn2, $query2) or die("Could not execute query!2");


    mysqli_close($conn2);

    echo "<strong style=\"color: Blue;\">The new employee was added!</strong>";
}
?>  

<section class="footer">
            <h4>About Us</h4>
            <p>You can find us at: 3147 Prince Alfred St, Grahamstown, Makhanda, 6139 <br>
                © 2022 PC Repairs. All Rights Reserved. Proudly created by Team 6</p>
        </section>
</body>
</html>