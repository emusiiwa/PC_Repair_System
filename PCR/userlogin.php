<?php

require_once("config.php");
$conn = mysqli_connect(Servername, Username, Password, Database)
    or die("ERROR: unable to connect to database!");
// Processing form data when form is submitted
if (isset($_REQUEST['submit'])) {

    $email = $_REQUEST['uemail'];
    $password = $_REQUEST['upwd'];

    // issue query instructions
    $query = "SELECT * FROM users WHERE uemail = '$email' AND upwd = sha1('$password')";

    $result = mysqli_query($conn, $query) or die("ERROR: unable to execute query!");
            
    if($result){
        $row = mysqli_fetch_array($result);
        
        var_dump($row);

        $user = $row['uemail'];
        $_SESSION["user"]= $user;

        echo $_SESSION["user"];
        header("Location:manage.php");
    }else	{
      header("Location:userlogin.php?err=1");
    }
}
// close the connection to database
mysqli_close($conn);
?>

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
        <h1>ClientLog-In</h1>

        <form action="userlogin.php" method="POST">

            <div class="user">
                <input type="text" name="uemail" autofocus required>
                <span></span>
                <label for="username">User-email</label>
            </div>

            <div class="user">
                <input type="password" name="upwd" required>
                <span></span>
                <label for="password">Password</label>
            </div>

            <div class="user-pass">Forgot Password ?</div>

            <input type="submit" name="submit" value="Log-In">

            <div class="register">
                Not a member? <a href="signup.php">Sign-Up</a>
            </div>

        </form>
    </div>

</body>



</html>