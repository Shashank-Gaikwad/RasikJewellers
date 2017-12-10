
<html lang="en">
<head>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/image.css">
	<!--<link rel="stylesheet" href="css/homepage.css">-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<!--	<script src='https://www.google.com/recaptcha/api.js'></script>-->
	<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->

	<script>
	$(document).ready(function(){
    $('ul.nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
});
	</script>
</head>
<body style="background-color:white;">
<!--Navigation bar start-->
<nav class="navbar navbar-default" style="background-color:white;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand " href="index.php"  style="color:#990099;">RASIK JEWELLERS</a>
       <!--<a class="navbar-brand " href="index.php"  style="color:white;"><b>Rasik Jewellers</b></a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" >

        <li><a href="index.php" style="color:#990099;">HOME</a></li>
        <li><a href="aboutus.php" style="color:#990099;">ABOUT US</a></li>
        <li><a href="contactus.php" style="color:#990099;">CONTACT US</a></li>
		<li><a href="enquiry.php" style="color:#990099;">ENQUIRY</a></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#990099;">PRODUCTS
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<div class="container">
					<div class="panel panel-primary">
						<div class='panel-body'>
							<div class="row">
								<div class="col-md-3">
									<li><a href="category.php?category=Mangalsutra&subcategory=none" style="color:#990099;"><h5>MANGALSUTRAS<h5></a></li>
									<li class="divider"></li>
									<li><a href="category.php?category=Mangalsutra&subcategory=Long" style="color:#990099;">Long</a></li>
									<li><a href="category.php?category=Mangalsutra&subcategory=Short" style="color:#990099;">Short</a></li>
									<li><a href="category.php?category=Mangalsutra&subcategory=Classic" style="color:#990099;">Classic</a></li>
									<li><a href="category.php?category=Mangalsutra&subcategory=Delux" style="color:#990099;">Sr. Delux</a></li>
								</div>
								<div class="col-md-3">
									<li><a href="category.php?category=Ring&subcategory=none" style="color:#990099;"><h5>RINGS<h5></a></li>
									<li class="divider"></li>
									<li><a href="category.php?category=Ring&subcategory=Gents" style="color:#990099;">Gents</a></li>
									<li><a href="category.php?category=Ring&subcategory=Ladies" style="color:#990099;">Ladies</a></li>
									<li><a href="category.php?category=Ring&subcategory=Heart Classic" style="color:#990099;">Classic</a></li>
									<li><a href="category.php?category=Ring&subcategory=Engagement Diamond" style="color:#990099;">Diamond</a></li>
								</div>
								<div class="col-md-3">
									<li><a href="category.php?category=Earring&subcategory=none" style="color:#990099;"><h5>EARRINGS<h5></a></li>
									<li class="divider"></li>
									<li><a href="category.php?category=Earring&subcategory=Gents" style="color:#990099;">Gents</a></li>
									<li><a href="category.php?category=Earring&subcategory=Ladies" style="color:#990099;">Ladies</a></li>
									<li><a href="category.php?category=Earring&subcategory=Heart Classic" style="color:#990099;">Classic</a></li>
									<li><a href="category.php?category=Earring&subcategory=Engagement Diamond" style="color:#990099;">Diamond</a></li>
                                    <li><a href="category.php?category=Earring&subcategory=Fancy" style="color:#990099;">Fancy</a></li>
								</div>
								<div class="col-md-3">
									<li><a href="category.php?category=Neckless&subcategory=none" style="color:#990099;"><h5>NECKLESS<h5></a></li>
									<li class="divider"></li>
									<li><a href="category.php?category=Neckless&subcategory=Classic" style="color:#990099;">Classic</a></li>
									<li><a href="category.php?category=Neckless&subcategory=Kolkata" style="color:#990099;">Kolkata</a></li>
									<li><a href="category.php?category=Neckless&subcategory=Kundan" style="color:#990099;">Kundan</a></li>
									<li><a href="category.php?category=Neckless&subcategory=Antique" style="color:#990099;">Antique</a></li>
									<li><a href="category.php?category=Neckless&subcategory=Nice" style="color:#990099;">Nice</a></li>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<li><a href="category.php?category=Payal&subcategory=none" style="color:#990099;"><h5>PAYAL<h5></a></li>
									<li class="divider"></li>
									<li><a href="category.php?category=Payal&subcategory=Stone" style="color:#990099;">Stone</a></li>
									<li><a href="category.php?category=Payal&subcategory=Fancy" style="color:#990099;">Fancy</a></li>
									<li><a href="category.php?category=Payal&subcategory=Mahrani" style="color:#990099;">Mahrani</a></li>
									<li><a href="category.php?category=Payal&subcategory=Round" style="color:#990099;">Round</a></li>
								</div>
								<div class="col-md-3">
									<li><a href="category.php?category=Other&subcategory=none" style="color:#990099;"><h5>OTHER<h5></a></li>
									<li class="divider"></li>
									<li><a href="category.php?category=Rani Haar&subcategory=none" style="color:#990099;">Rani Haar</a></li>
									<li><a href="category.php?category=Temple Set&subcategory=none" style="color:#990099;">Temple Sets</a></li>
                                    <li><a href="category.php?category=24&subcategory=none" style="color:#990099;">24kt Gold</a></li>
    								<li><a href="category.php?category=20&subcategory=none" style="color:#990099;">20kt Gold</a></li>
    								<li><a href="category.php?category=18&subcategory=none" style="color:#990099;">18kt Gold</a></li>
								</div>
                                <div class="col-md-3">
                                    <li><a href="category.php?category=Other&subcategory=none" style="color:#990099;"><h5>OTHER<h5></a></li>
                                    <li class="divider"></li>
    								<li><a href="category.php?category=Men&subcategory=none" style="color:#990099;">Men's Jewellery</a></li>
    								<li><a href="category.php?category=Women&subcategory=none" style="color:#990099;">Women's Jewellery</a></li>
    								<li><a href="category.php?category=Gold&subcategory=none" style="color:#990099;">Gold Jewellery</a></li>
    								<li><a href="category.php?category=Silver&subcategory=none" style="color:#990099;">Silver Jewellery</a></li>
    								<li><a href="category.php?category=Diamond&subcategory=none" style="color:#990099;">Diamond Jewellery</a></li>
    						</div>
                                <div class="col-md-3">
                                    <li><a href="category.php?category=Other&subcategory=none" style="color:#990099;"><h5>OTHER<h5></a></li>
                                    <li class="divider"></li>
                                    <li><a href="category.php?category=Pendent&subcategory=none" style="color:#990099;">Pendent</a></li>
                                    <li><a href="category.php?category=Nath&subcategory=none" style="color:#990099;">Nath</a></li>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</ul>
		</li>

        <!--<li><a href="#" style="color:white;" data-toggle="modal" data-target="#myLoginModal"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>-->
		<?php
			if (!isset($_SESSION['username']))
			{
				echo"<li><a href='#' style='color:#990099;' data-toggle='modal' data-target='#myLoginModal'><span class='glyphicon glyphicon-log-in'></span> ADMIN LOGIN</a></li>";
			}
			else
			{
				//<a href="login.php?action=logout">Logout</a>
				echo"<li><a href='login.php?action=logout' style='color:#990099;'><span class='glyphicon glyphicon-log-in'></span> Log Out</a></li>";
			}
		?>
      </ul>
    </div>
  </div>
</nav>
<div class="modal fade" id="myLoginModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#990099;">Admin Login</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="login.php">
          	<div class="row">
          		<div class="col-md-2" style="color:#990099;">UserName:</div>
          		<div class="col-md-6" style="color:#990099;"><input type="text" name="username"></div>
          	</div><br>
          	<div class="row">
          		<div class="col-md-2" style="color:#990099;">Password:</div>
          		<div class="col-md-6" style="color:#990099;"><input type="password" name="password" /></div>
          	</div><br>
          	<!--<div class="row">
          		<div class="col-md-8"><div class="g-recaptcha" data-sitekey="6LflyxsTAAAAADDF1bDA8x7r6sQvMC8PUT3rPDKX"></div><br></div>
          	</div><br>-->
          	<div class="row">
          		<div class="col-md-4"><input type="submit" style="color:#990099;" name="bttLogin" value="Login"></div>
          		<div class="col-md-4"><input type="reset" style="color:#990099;" value="Clear"></div>
          	</div>


          </form>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
