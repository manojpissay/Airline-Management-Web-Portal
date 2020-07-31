<!DOCTYPE html>
<html>
<head>
<title>GoJet Airways</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />-->

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

        /*function getmin(){
        	var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
			var yyyy = today.getFullYear();

			today = yyyy + '-' + mm + '-' + dd;
			alert(today);
			document.getElementById("travel").min(today);
        }
        getmin();*/
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>
<body>
		<div class="sidenav">
  <a href="home.php" active>About</a>
  <a href="search.php">Search</a>
  <a href="cancel.php">Cancel</a>
  <a href="check.php">Check</a>
  <a href="login.php">Login</a>
</div>
<div class="main"> 
	<div class="bg-layer">
		<h1>GoJet Airways Check Out Flights</h1>
		<div class="header-main" style="width: 700px" >
			<!--<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>-->
			<!--<div class="container">
				<span class="glyphicon glyphicon-plane" style="color: blue;align: center; font-size: 50px;"></span></div>-->
			<img src="icon.png" style=" display: block;  margin-left: auto;  margin-right: auto;height: 80px;width:80px;border-radius: 50%" ><br><br>
			<div style="color: white;">CHECK OUT FLIGHTS!!</div><br>
			<div class="header-left-bottom">
				<form action="book_one.php" method="POST">

<!--"<?php //echo $_SERVER["PHP_SELF"];?>"-->

					<!--<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" placeholder="Name" name="name" required=""/>add constraint no special characters
					</div>

					<div class="icon1 ">
						<span class="glyphicon glyphicon-envelope"></span>
						<input type="email" placeholder="Email Address" name="email" required=""/>
					</div>-->

					<!--<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" placeholder="Password" required=""/>
					</div>-->


					<fieldset>

						<LEGEND style="color: white;"> TRAVEL DETAILS</LEGEND><br>

						<div class="icon1">
							<select name="source" placeholder="Source" name="source" required>
								<option value="" selected="selected">Source</option>
   								<option value="Bengaluru" >BANGALORE</option>
								<option value="Hyderabad" >HYDERABAD</option>
								<option value="Mumbai" >MUMBAI</option>
								<option value="Delhi" >DELHI</option>
								<option value="Kolkata" >KOLKATA</option>
  							</select>
  						</div>

  						<div class="icon1">
  							<select name="destination" placeholder="Destination" required>
  							<option value="" selected="selected">Destination</option>
  							<option value="Bengaluru" >BANGALORE</option>
							<option value="Hyderabad" >HYDERABAD</option>
							<option value="Mumbai" >MUMBAI</option>
							<option value="Delhi" >DELHI</option>
							<option value="Kolkata" >KOLKATA</option>
  							</select>
  						</div>

  						<div class="icon1">
							<select name="class" placeholder="Class" name="source" required>
								<option value="" selected="selected">Class</option>
   								<option value="First Class" >FIRST CLASS</option>
								<option value="Economy Class" >ECONOMY CLASS</option>
								<option value="Business Class" >BUSINESS CLASS</option>								
  							</select>
  						</div>
  													
						<div class="icon1">
							<input type="date" name="travel" placeholder="Travel date" min="2019-03-22" max="2019-04-23" required/></div>
							<!--give constraint for date using php-->
						<div class="icon1">
							<input type="number" name="num_seats" placeholder="Number of Seats" min="1" max="20"/>
							</div>
							
					</fieldset>
					
					<div class="bottom">
						<input type="submit" name='submit' style="background: #007cc0;    color: #fff;
    font-size: 15px;
    text-transform: uppercase;
    padding: .8em 2em;
    letter-spacing: 1px;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    display: inline-block;
    cursor: pointer;
    outline: none;
    border: none;
	width: 100%;"/>
					</div>

					
				</form>	

				

		</div>
			
		</div>
		<div class="copyright">
			<p>© 2019 GoJet Airways. All rights reserved | 
		</div>
	</div>
</div>




</body>
</html>