<?php
//include auth_session.php file on all user panel pages
include("auth_client.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="Images\favicon.ico">
    <title>PCRepairs</title>
</head>


<body>

    <header>
        <h1><b>PCRepairs</b></h1>
    </header>

    <section class="help-form">
        <form action="" method="post" class="chat">


            <label for="emailAd">Your email address:</label>
            <input type="email" name="emailAd" id="emailAd" size="32" required autofocus><br><br>
            <label for="help">Your Question:</label>
            <textarea name="help" id="help" cols="30" rows="5"></textarea><br><br>

            <input type="submit" value="Submit Question"><br><br>
        </form>
    </section>
</body>

</html>