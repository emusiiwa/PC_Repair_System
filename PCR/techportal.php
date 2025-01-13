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
    <main>
    <?php require_once("navbar.php");?>

    <style>
       table, tr
        {
           border-collapse: collapse;
           width: 100%;
        }
        tr
        {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even)
        {
            background-color: lightgray;
        }
</style>

        <?php
        if (isset($_REQUEST['login'])) 
        { 
            $usermail = $_REQUEST['uemail']; 
        } 

        ?>

        <section id="heading">PC Repairs</section>

        

        <section id="manage">

 
        </section>



        <section class="footer">
            <h4>About Us</h4>
            <p>You can find us at: 3147 Prince Alfred St, Grahamstown, Makhanda, 6139 <br>
                © 2022 PC Repairs. All Rights Reserved. Proudly created by Team 6</p>
        </section>

    </main>

</body>


</html>