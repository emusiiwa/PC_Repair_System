<!DOCTYPE html>
<?php
//get values from the form

require_once("config.php");
if (isset($_REQUEST['login'])) {


    $usermail = $_REQUEST['uemail'];
    $password = $_REQUEST['upwd'];
    

    $conn = mysqli_connect(Servername, Username, Password, Database) or die("Could not connect to database!");

    $query = "SELECT * FROM tech_user WHERE tech_email = '$usermail' AND tech_pwd = sha1('$password')";

   
    
    $result = mysqli_query($conn, $query) or die("Could not execute query!");

    $row =  mysqli_fetch_array($result);

    if($result){
        $_SESSION["staff"]= $row['tech_email'];
        header("Location:Dashboard.php");
    }else{
        //header("Location:stafflogin.php?err=1");
      }
  }
?>
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
        <h1>Staff Log-In</h1>

        <form action="stafflogin.php" method="post">

            <div class="user">
                <input type="text" name="uemail" autofocus required>
                <span></span>
                <label for="username">Staff-Identification</label>
            </div>

            <div class="user">
                <input type="password" name="upwd" required>
                <span></span>
                <label for="password">Password</label>
            </div>

            <div class="user-pass">Forgot Password ?</div>

            <input type="submit" name="login" value="Log-In">

            <div class="register">

            </div>

        </form>
    </div>

</body>

</html>