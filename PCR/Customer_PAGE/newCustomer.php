<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCRepairs</title>
</head>

<body>
    <h2>Register</h2>

    <form action="newCustomer.php" method="post">
        First Name <input type="text" name="Fname" required><br><br>
        Last Name <input type="text" name="Lname" required><br><br>
        Contact Number <input type="int" name="Contact_Num" required><br><br>
        Email <input type="email" name="Email" required><br><br>
        Address <input type="text" name="Address" required><br><br>
        Password <input type="password" name="password" minlength="8" required><br><br>

        <input type="submit" name="submit" value="Add ME">
    </form>


    <?php
  require_once("config.php");
  if (isset($_REQUEST['submit'])) {
    $Password = $_REQUEST['password'];
    $Fname = $_REQUEST['Fname'];
    $Lname = $_REQUEST['Lname'];
    $Contact_Num = $_REQUEST['Contact_Num'];
    $Email = $_REQUEST['Email'];
    $Address = $_REQUEST['Address'];

    $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

    $query = "INSERT INTO customer(Fname, Lname, Contact_Num, Email, Address)
              VALUE('$Fname','$Lname',$Contact_Num,'$Email','$Address')";

    $Results = mysqli_query($conn, $query) or die("Could not execute query!");
    /* $query1 = "SELECT Customer_ID from customers where email = $Email";

    $results = mysqli_query($conn,$query1) or die("Could not execute query!");
    $row = mysqli_fetch_array($results);
    $Cust_ID = $row['Customer_ID'];

    $query2 = "INSERT INTO users(user_id,uemail,upwd,cus_ID)
              VALUE('$','$',$,'$Cust_ID')";

    $Results2 = mysqli_query($conn, $query2) or die("Could not execute query!"); */

    mysqli_close($conn);

    header("clientlogin.php");
    echo "<a><strong style=\"color: black;\">Successfully added </strong></a>";
  }
  ?>
</body>

</html>