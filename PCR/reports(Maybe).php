<!DOCTYPE html>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Wallet</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
   
  </head>

  <body>

<!-- Static navbar -->
<div class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">ALLUVIAL</a>
      <h6>
        Streamlined crypto analysis
      </h6>
    </div>
    <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="wallet.php"> Wallet </a></li>
			    <li><a href="trades.php"> Trades</a></li>
                <li><a href="reports.php">Reports</a></li>
            <li><a href="logout.php">LogOut</a></li>
            <li><a href="#">User : <?php echo $_SESSION["login"];?></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

	<!-- +++++ Main Section +++++ -->
<div id="page-container">
  <div id="content-wrap">
    <!-- all other page content -->
    <div class="container">
			<div class="row">
          <!-- all other page content -->
          <h2>ZAR AMOUNT</h2>
          <h4>Profit/Loss</h4>
          <table style="width:30%">
          <tr>
          <th>All Time</th>
          <th>Totals</th>
          </tr>
          <tr>
          <td>
          <form action="wallet.php" method="POST">
          <fieldset>
              <label for= "Money In"> - Money In</label><br>
              <input type="number" id="moneyin" name="moneyin"><br>
              <input type="submit" name="submit" value="Enter">
            </fieldset>
          </form>
          </td>
          <td>Total in</td>
          </tr>
          <tr>
          <td>
          <form action="wallet.php" method="POST">
          <fieldset>
              <label for= "Money out">+ Money out</label><br>
              <input type="number" id="moneyout" name="moneyout"><br>
              <input type="submit" name="submit2" value="Enter">
          </fieldset>
          </form>
          </td>
          <td>Total Out</td>
          </tr>
          <tr>
          <td><h4>Profit is ---%</h4></td>
          <td>----%</td>
          </tr>
          </table>

				</div>
        </div>
  </div>
	
	<!-- +++++ Footer Section +++++ -->
  <footer id="footer">	
    <div class="container">
			<div class="row">
					<p>
           <p></p>
						
					</p>
				</div><!-- /col-lg-4 -->
			</div>
		</div>
</footer>
</div>

	
  </body>
</html>
