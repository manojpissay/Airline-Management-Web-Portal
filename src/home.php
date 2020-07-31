<?php 
$db = pg_connect("host=localhost dbname=goJetAirways user=postgres password=");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>GoJet Airways</title>

	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

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
		<h1>GoJet Airways</h1>


		<div class="header-main" >
			<img src="icon.png" style=" display: block;  margin-left: auto;  margin-right: auto;height: 80px;width:80px;border-radius: 50%" ><br><br>
			<h3>About Our Airlines<span></span></h3>
			<figure><img src="images/page1_img1.jpg" alt="" class="pad_bot2"></figure>
			<p style="color:white">The GoJet Airways route network spans across prominent business metros as well as key leisure destinations across the Indian subcontinent. GoJet Airways currently renders its services at the airports in Ahmedabad, Bagdogra, Bengaluru, Bhubaneswar, Chandigarh, Chennai, Delhi, Goa, Guwahati, Hyderabad, Jaipur, Jammu, Kochi, Kolkata, Kannur, Leh, Lucknow, Mumbai, Nagpur, Patna, Port Blair, Pune, Ranchi, Srinagar, Phuket, Malé and Muscat. Through this route network GoJet Airways ensures a smart value-for-money option for both business and leisure travellers, without compromising on either safety or service factors.</p>
			<figure><img src="images/page1_img2.jpg" alt="" class="pad_bot2"></figure>
			<p style="color:white">GoJet Airways's distribution network has been well-researched. Following a thorough evaluation of the available mediums, the airline has introduced a gamut of options, specially designed to make tickets very accessible to its passengers. GoJet hosts convenient online booking options wherein a passenger or his associate can book GoJet tickets anytime round the clock, 365 days a year from the comfort of their home. For those passengers who do not have a credit or a debit card or access to a web networked computer, tickets can be booked from other distribution mediums including Travel Agents or via GoJet’s Call Centres. Tickets can also be booked from GoJet airport counters.</p>
		</div>

		<div class="copyright">
			<p>© 2019 GoJet Airways. All rights reserved | 
		</p>
	</div>

		</div>


		</div>
		</body>
		</html>	
          