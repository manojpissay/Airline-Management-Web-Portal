<?php
	
			    $db = pg_connect("host=localhost dbname=goJetAirways user=postgres password= ");
			    session_start();?>

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
		<h1>GoJet Airways Payment form</h1>
		<div class="header-main" >
			<!--<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>-->
			<!--<div class="container">
				<span class="glyphicon glyphicon-plane" style="color: blue;align: center; font-size: 50px;"></span></div>-->
			<img src="icon.png" style=" display: block;  margin-left: auto;  margin-right: auto;height: 80px;width:80px;border-radius: 50%" ><br><br>
             
			<div class="header-left-bottom">
				


<?php
	
	$totamt=$_SESSION['totamt'];
	$bkid=$_SESSION['bkid'];
	if(!empty($_POST['charge'])){
			$charge="";

			//$query1="update booking_bill set chargeid='$charge';";
			foreach ($_POST['charge'] as $selected) {
				$query="select amount from charges where chargeid='$selected'; ";
				$amt=pg_query($db,$query);
				$amt=pg_fetch_assoc($amt);
				$charge=$charge.";".$selected;
				$totamt=(float)$totamt+(float)$amt;
			}
			$query1="update booking_bill set chargeid='$charge' where bkid='$bkid';";
			$update=pg_query($db,$query1);

		}
	if(!empty($_POST['discount'])){
		$discnt=$_POST['discount'];
			$query1="update booking_bill set discountid='$discnt' where bkid='$bkid';";
		$update=pg_query($db,$query1);
		$query="select amount from discounts where discountid='$discnt' ; ";
				$amt=pg_query($db,$query);
				$amt=pg_fetch_assoc($amt);
				$totamt=(float)$totamt-(float)$amt;

	}

	$query6="UPDATE Booking_Bill AS B SET TotalAmt='$totamt'";
					$amt=pg_query($db,$query6);
	?>
  <p style="color:white;text-align: center">TOTAL AMOUNT TO BE PAID :<?php echo $totamt;?></p>
  <form action="" method='post'>
  <input type="submit" name="confirm" style="background: #007cc0;    color: #fff;" value="GO TO PAYMENT" >
</form>

<?PHP
	if(isset($_POST['confirm'])){
		?>
		<form action="" method="post">
		<input type="radio" name="pay" /><img src="images/visa.png" style="width:20%; height: 20%"><br/>
  		<input type="radio" name="pay" / ><img src="images/paytm.png" style="width:20%; height: 20%"><br/>
  		<input type="submit" name='pay' id='pay' style="background: #007cc0; color: #fff;" value="PAY"/>
  	</form>
 	<button style="display: inline-block; value="back" type='submit' onclick="location.href='search.php'" style ="text-align:left"  name="back">BACK</button>
  	<?php
  	$_SESSION['bkid']=$bkid;
}
  	if(isset($_POST['pay'])){$bkid=$_SESSION['bkid'];
  		$bkid=$_SESSION['bkid'];
  		$query="update booking_bill set totalamt='$totamt',seatconfirmation='Y' where bkid='$bkid';";
  		$res=pg_query($db,$query);
  		//$bkid=$_SESSION['bkid'];
  		$tkid=str_replace('T','B',$bkid);
  		//echo $bkid;
  		$query="insert into ticket values ('$tkid','$bkid','Y');";
  		$res=pg_query($db,$query);
  		?><br>
  		<div id="ProgressBar" style="width:100%;background-color: #ddd;">
  			<div id="myBar"   style="width:1%;background-color: #ADD8E6;"></div></div>
  		
<div style="color: white; text-align: center">TICKET IS CONFIRMED<BR>TICKET WILL MAILED TO SHORTLY</div>

<?php	} 
?>
	</div>
			
		</div>
		<div class="copyright">
			<p>© 2019 GoJet Airways. All rights reserved |</p> 
		</div>
	</div>
</div>

<script>
document.getElementById("pay").onclick()=function(){ProgressBar();}
function ProgressBar(){
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}
</script>

</body>
</html>