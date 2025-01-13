<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling\login.css">
    <link rel="icon" type="image/x-icon" href="styling\Images\favicon.ico">
    <title>PCRepairs</title>
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="styling\Images\PCRepairs logo.png" alt="logo"></a>

            <div class="nav-links">

                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
        </nav>
    </section>

    <div class="log-in">
        <h1>Sign-Up</h1>

        <form action="signup.php" method="post">

            <div class="user">
                <input type="text" name="fname" autofocus required>
                <span></span>
                <label for="fname">First Name</label>
            </div>

            <div class="user">
                <input type="text" name="lname" required>
                <span></span>
                <label for="lname">Surname</label>
            </div>

            <div class="user">
                <input type="number" name="contact" required>
                <span></span>
                <label for="contact">Contact Number</label>
            </div>

            <div class="user">
                <input type="email" name="email" required>
                <span></span>
                <label for="email">Email</label>
            </div>

            <div class="user">
                <input type="text" name="address" required>
                <span></span>
                <label for="address">Address</label>
            </div>

            <div class="user">
                <input type="password" name="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>

            <!--             <div class="user">
                <input type="password" name="confirmpassword" required>
                <span></span>
                <label for="confirmpassword">Confirm Password</label>
            </div> -->


            <div class="user-pass">By signing up, you agree to our <strong>Terms , Privacy Policy and Cookies Policy.
            </div>

            <input class="button" type="submit" name="submit" value=" Sign-Up">

            <div class="register">
                Have an account? <a href="clientlogin.php">Log-In</a>
            </div>

        </form>
    </div>

    <!--     <script>

    document.querySelector('.button').onclick = function(){
        var password = document.querySelector('.password').value,
            confirmpassword = document.querySelector('.confirmpassword').value;

        if (password != confirmpassword){
            alert("Password does not match!");
            return false;
        }
    }
        
    </script> -->

    <?php

    require_once("config.php");
    if (isset($_REQUEST['submit'])) {


        $Fname = $_REQUEST['fname'];
        $Lname = $_REQUEST['lname'];
        $Contact_Num = $_REQUEST['contact'];
        $Email = $_REQUEST['email'];
        $Address = $_REQUEST['address'];
        //$Password = $_REQUEST['password'];

        /*  $Confirm_password = $_REQUEST['confirm_password'];
        if ($_POST['password'] == $_POST['confirm_password']) {
            echo "passwords match";
        } else {
            echo "passwords do not match";
        } */

        $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

        $query = "INSERT INTO customers(Fname, Lname, Contact_Num, Email, Address)
              VALUE('$Fname', '$Lname', $Contact_Num,'$Email','$Address')";
        $Results = mysqli_query($conn, $query) or die("Could not execute query!");

        $query1 = "SELECT * FROM customers WHERE  Email = '$Email'";
        $Results1 = mysqli_query($conn, $query1) or die("Could not execute query!1");



        $row = mysqli_fetch_array($Results1);
        $cus_ID = $row['Customer_ID'];


        $query2 = "INSERT INTO users (uemail, upwd, cus_ID)
            VALUE ('$Email', SHA1('$Password'), '$cus_ID')";
        $Results2 = mysqli_query($conn, $query2) or die("Could not execute query!2");


        mysqli_close($conn);
    }
    ?>

</body>


</html>