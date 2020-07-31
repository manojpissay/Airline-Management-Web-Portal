
<?php
    $db = pg_connect("host=localhost dbname=goJetAirways user=postgres password= ");
    
    /*do{$psid=rand(20000,99999);
		$q="select count(*) from passenger where psid='P.$psid';";
		$c=pg_query($db,$q);}
    while($c==0);*/?>
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
			<div style="color: white;">CHECK OUT FLIGHTS!!</div>
			<div class="header-left-bottom">
				<!--<div class="txt" id="passengerid">Your Passsenger id:P<?php echo $psid;?></div>&nbsp;&nbsp;-->
				<div class="txt" name="num_seats">Number of seats:<?php echo $_POST['num_seats'];?></div>
				<br><br>
				<div class="txt">SCHEDULE</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="txt">TRAVEL DATE</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="txt" >DEPARTURE</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="txt">ARRIVAL</div><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="txt"><span class="glyphicon glyphicon-plane"></span></div>&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="txt"><span class="glyphicon glyphicon-calendar"></span></div>&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="txt" name="source"><?php echo $_POST['source'];?></div>
				<div class="txt"><span class="glyphicon glyphicon-minus"></span></div>&nbsp;
				<div class="txt"><span class="glyphicon glyphicon-minus"></span></div>
				&nbsp;<div class="txt"><span class="glyphicon glyphicon-arrow-right"></span></div>
				<div class="txt" name="destination"><?php echo $_POST['destination'];?></div>
				<br><br>

				<?php
    //$db = pg_connect("host=localhost dbname=goJetAirways user=postgres password=flash312 ");
    
	session_start();
//$name=$_POST['name'];
//$email=$_POST['email'];
$source=$_POST['source'];
$dest=$_POST['destination'];
$travel=$_POST['travel'];
$num_seats=$_POST['num_seats'];
$class=$_POST['class'];

if($source==$dest){ ?><script>alert("enter the right details");</script>

<?php header("Location:search.php");}


//$_SESSION['name']=$name;
//$_SESSION['email']=$email;
$_SESSION['num_seats']=$num_seats;
$_SESSION['class']=$class;
//$_SESSION['psid']='P'.$psid;

//$query="insert into passenger values ('$name','$email','num_seats','null','null','null');";
$query="select rtid from route where source='$source' and destination='$dest';";
//echo $query;
$route=pg_query($db,$query);
$route=pg_fetch_assoc($route);
//echo $route;
$querys="select * from schedule where rtid='$route[rtid]' and traveldate='$travel'  ;";
//echo $querys;
$schedule=pg_query($db,$querys);
//$sch=pg_fetch_assoc($schedule)
$x=0;
//$sch=pg_fetch_assoc($schedule);


		 while($sch=pg_fetch_assoc($schedule)){

		 	$query="select * from (ticket natural join booking_bill) natural join passenger where passenger.scid='$sch[scid]' and ticket.paymentconfirmation='Y' and passenger.acclass='$class';";
		 	$ticket=pg_query($db,$query);
			$count=pg_num_fields($ticket);
			$ticket=pg_fetch_assoc($ticket);

			$query1="select * from (schedule natural join aircraft) natural join class  where schedule.scid='$sch[scid]' and class.name='$class';";  
			$tot_seats=pg_query($db,$query1);
			$tot_seats=pg_fetch_assoc($tot_seats);

			$acseats=$tot_seats['totalseats']-$count;

			if($acseats>=$num_seats){
		 	?>
  		&nbsp;<div class="txt" name="scheduleid" ><?php echo $sch['scid'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='txt' name='traveldate' ><?php echo $sch['traveldate'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='txt' name='departtime' ><?php echo $sch['departtime'];?></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class='txt' name='arrivetime' ><?php echo $sch['arrivetime'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
		
		<?php $_SESSION['scid']=$sch['scid'];?>
		<div style="display: inline-block;">
		<form action="passenger_details.php" method="POST">
  		<button style="display:inline-block;"  value="<?php echo $sch['scid'];?>"  type='submit'  name='book'>BOOK</button></form></div>
  		<br><br>

<?php $x=$x+1;}}
	if($x==0){echo "<div class='txt'>SORRY NO FLIGHTS AVAILABLE </div>";}
?>
	<button style="display: inline-block; value="back" type='submit' onclick="location.href='search.php'" name="back">BACK</button>
	<?php	if(isset($_POST['book'])){
		$_SESSION['book']=$_POST['book'];
		//echo $_SESSION['book'];
	}?>
		</div>
			
		</div>
		<div class="copyright">
			<p>© 2019 GoJet Airways. All rights reserved |</p> 
		</div>
	</div>
</div>




</body>
</html>