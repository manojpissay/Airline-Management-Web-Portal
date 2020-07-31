<?php
    $db = pg_connect("host=localhost dbname=goJetAirways user=postgres password= ");
    session_start();
    if(isset($_POST['book'])){	
    $_SESSION['book']=$_POST['book'];
    //echo $scid;
}
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
	<style type="text/css">
		.txt{color: white;
			display: inline-block;
			}

	</style>
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
		<h1>GoJet Airways BOOK FLIGHTS</h1>
		<div class="header-main" >
			<!--<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>-->
			<!--<div class="container">
				<span class="glyphicon glyphicon-plane" style="color: blue;align: center; font-size: 50px;"></span></div>-->
			<img src="icon.png" style=" display: block;  margin-left: auto;  margin-right: auto;height: 80px;width:80px;border-radius: 50%" ><br>
			
			<div class="header-left-bottom">
	<div class="txt" > ENTER THE PASSENGER DETAILS: </div>
	<br>
	<form action="" method="post">
	<?php
		$num_seats=$_SESSION['num_seats'];
		$class=$_SESSION['class'];
	 for ($i=0; $i < $num_seats; $i++) { 
	 	?>
	 	<fieldset>
	 		<LEGEND style="color: white;"> PASSENGER <?php echo $i+1 ;?> </LEGEND><br>
	 		<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" placeholder="Name" name="name<?php echo $i+1;?>" required=""/>
					</div>
			<div class="icon1 ">
						<span class="glyphicon glyphicon-envelope"></span>
						<input type="email" placeholder="Email Address" name="email<?php echo $i+1;?>" required=""/>
					</div>		

	 	</fieldset>
	<?php
	 }

	 ?>

	 <button style="display: inline-block;text-align:left;" value="back" type='submit' onclick="location.href='search.php'"   name="back">BACK</button>
	 &nbsp;&nbsp;&nbsp;
	 <button type="submit" name="done" style="text-align: right">DONE</button>
	
	</form>

	<?php 
	$scid=$_SESSION['book'];
	$query="select * from (ticket natural join booking_bill) natural join passenger where passenger.scid='$scid' and ticket.paymentconfirmation='Y' and passenger.acclass='$class';";
		 	$ticket=pg_query($db,$query);
			$count=pg_num_fields($ticket);
			$ticket=pg_fetch_assoc($ticket);

			$query1="select * from (schedule natural join aircraft) natural join class  where schedule.scid='$scid' and class.name='$class';";  
			$tot_seats=pg_query($db,$query1);
			$tot_seats=pg_fetch_assoc($tot_seats);

			$acseats=$tot_seats['totalseats']-$count;

	if(isset($_POST['done'])){
		$scid=$_SESSION['book'];
		$psid_book='';
		for ($i=1; $i <= $num_seats; $i++) { 
			$n='name'.$i;
			$e='email'.$i;			
			$name=$_POST[$n];
			$email=$_POST[$e];
			do{$psid=rand(20000,99999);
			$q="select count(*) from passenger where psid='P.$psid';";
			$c=pg_query($db,$q);}
    		while($c==0);
    		$psid='P'.$psid;
    		if($i==1){$psid_book=$psid;}
			$query="insert into passenger values ('$psid','$name','$email','$class','$acseats','$scid',null);";
			$res=pg_query($db,$query);
			$query1="update passenger set psid_book='$psid_book' where psid='$psid';";
			$res1=pg_query($db,$query1);
			}


			$bkid=str_replace('S','B',$scid).($count+rand(2,50));
			$query3="insert into booking_bill values ('$bkid','0','0',null,null,'$psid_book','N','0');";
			$insert=pg_query($db,$query3);

			$query4="update Booking_Bill AS B SET FLightFare=(Select R.Fare From Schedule AS S natural join Route AS R WHERE S.scid='$scid' );";
			$flightfare=pg_query($db,$query4);
			$query8="select flightfare from booking_bill where bkid='$bkid';";
					$ff=pg_query($db,$query8);
					$ff=pg_fetch_assoc($ff);

			$query5="UPDATE Booking_Bill as B set baggagefare=(Select baggagecapacity from (Schedule natural join aircraft) natural join class where class.name='$class' and schedule.scid='$scid')*300";
					$bagfare=pg_query($db,$query5);	

			$query7="select baggagefare from booking_bill where bkid='$bkid';";
					$bagfare=pg_query($db,$query7);
					$bagfare=pg_fetch_assoc($bagfare);	

			$totamt=(float)($ff['flightfare']*$num_seats)+(float)($bagfare['baggagefare']);
					$query6="UPDATE Booking_Bill AS B SET TotalAmt='$totamt' where bkid='$bkid';";
					$amt=pg_query($db,$query6);

					$_SESSION['totamt']=$totamt;
					$_SESSION['bkid']=$bkid;
					?>
					<p style="text-align: center;color: white;width:100%">FLIGHT FARE:<?php echo $ff['flightfare'];?><br>BAGGAGE FARE:<?php echo $bagfare['baggagefare'];?><br>TOTAL AMOUNT:<?php echo $totamt;?></p><br>

					<form action="payment.php" method="post" style="color:white;">
<!--<p style="text-align:center; color: white;">-->
							CHARGES:<br>
							<input type="checkbox" name="charge[]" value="Tax" style="width: 5%;" checked onclick="return false;" />TAX<br/>
							<input type="checkbox" name="charge[]" value="Extra baggage(5kg)" style="width: 5%;"/>EXTRA BAGGAGE(5kg)<BR/>
							<input type="checkbox" name="charge[]" value="Carriage of Weapons" style="width: 5%;"/>WEAPONS<BR/>
  						<!--</p>-->
  						DISCOUNT:<BR>
  						<input type="radio" name="discount" value="go2000" style="width: 5%;"/>go2000<br/>
  						<input type="radio" name="discount" value="go3000" style="width: 5%;"/ >go3000<br/>
  						<input type="submit" style="color:white" value="Confirm"/>
</form>					
<?php
	}
	?>

	</div>
			
		</div>
		<div class="copyright">
			<p>© 2019 GoJet Airways. All rights reserved |</p> 
		</div>
	</div>
</div>




</body>
</html>    