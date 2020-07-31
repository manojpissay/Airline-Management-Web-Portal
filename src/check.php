<?php 
$db = pg_connect("host=localhost dbname=goJetAirways user=postgres password= ");
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
		<h1>GoJet Airways CHECK TICKETS</h1>
		<div class="header-main" >
			<!--<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>-->
			<!--<div class="container">
				<span class="glyphicon glyphicon-plane" style="color: blue;align: center; font-size: 50px;"></span></div>-->
			<img src="icon.png" style=" display: block;  margin-left: auto;  margin-right: auto;height: 80px;width:80px;border-radius: 50%" ><br><br>
             <div style="color: white;">CHECK YOUR TICKETS HERE&nbsp;&nbsp;&nbsp;   
             <button  onclick="location.href = 'admin.php';" style="display: inline-block; color:black">GO BACK</button> </div> <br><br>  
			<div class="header-left-bottom">


				<form action="" method="POST">
				<div class="icon1">
				<input type="text" name="psid" placeholder="PassengerID"></div><input type="submit" style="color:white" name="next" value="NEXT">
				</form>
				<BR>

				<?php
				
					if(isset($_POST['next'])){
						$psid=$_POST['psid'];
						$query="select * from (passenger natural join schedule) natural join route  where psid='$psid';";
						$result=pg_query($db,$query);
						$_SESSION['psid']=$psid;
						if(pg_num_rows($result)==0){echo "<p style='color:white'>PLEASE ENTER VALID ID</p>";}
            else{?>
                <div style="color: white">PSID &nbsp;&nbsp;&nbsp;&nbsp;NAME;&nbsp;&nbsp;&nbsp;&nbsp;TRAVEL DATE&nbsp;&nbsp;&nbsp;&nbsp;DEPARTTIME&nbsp;&nbsp;&nbsp;&nbsp;ARRIVETIME&nbsp;&nbsp;&nbsp;&nbsp;SOURCE&nbsp;&nbsp;&nbsp;&nbsp;DESTINATION</div>
              <?php
              while($res=pg_fetch_assoc($result)){
						?>
            
            <div style="color:white" id="<?php echo $res['psid'];?>"><div name="flight[]" id="flight<?php echo $x;?>" style="display: inline-block;"><?php echo $res['psid'];?></div>&nbsp;&nbsp;&nbsp;<?php echo $res['name']?>&nbsp;&nbsp;&nbsp;<?php echo $res['traveldate']?>&nbsp;&nbsp;&nbsp;<?php echo $res['departtime'];?>&nbsp;&nbsp;&nbsp;<?php echo $res['arrivetime'];?>&nbsp;&nbsp;&nbsp;<?php echo $res['source'];?>&nbsp;&nbsp;&nbsp;<?php echo $res['destination'];?>
					
				<?php }
			}
					 					 
					
				  }?>

				  <div style="color:white">NOT SURE ABOUT UR PASSENGER ID ?? NO PROBLEM ! &nbsp;&nbsp;
				  	<button data-toggle="collapse" data-target="#details" style="color: black">CLICK HERE</button></div><BR><br>

				<div id="details" class="collapse">
					<form action="#details" method="POST" onsubmit="return check(this)">
						<div class="icon1 ">
						<input type="email" placeholder="Email Address" name="email" required=""/>
					</div>
					  <div class="icon1">
							<select name="source" placeholder="Source" id="source" required>
								<option value="" selected="selected">Source</option>
   								<option value="Bengaluru" >BANGALORE</option>
								<option value="Hyderabad" >HYDERABAD</option>
								<option value="Mumbai" >MUMBAI</option>
								<option value="Delhi" >DELHI</option>
								<option value="Kolkata" >KOLKATA</option>
  							</select>
  						</div>

  						<div class="icon1">
  							<select name="destination" placeholder="Destination" id="dest" onclick="check()" required>
  							<option value="" selected="selected">Destination</option>
  							<option value="Bengaluru" >BANGALORE</option>
							<option value="Hyderabad" >HYDERABAD</option>
							<option value="Mumbai" >MUMBAI</option>
							<option value="Delhi" >DELHI</option>
							<option value="Kolkata" >KOLKATA</option>
  							</select>
  						</div>
  						<script type="text/javascript">
  							function check(form) {
        						if(document.getElementById('source').value==document.getElementById('dest')){alert("please enter right cities");return false;}
        						else return true;
        					}
    						
  						</script>

  						<button type="submit" name="check" id="check" >CHECK</button>

  						</form>
  						<p style="color: white"></p>

  						<?php
  						$ids=array();
  						if(isset($_POST['check'])){
  							$email=$_POST['email'];
  							$source=$_POST['source'];
  							$destination=$_POST['destination'];
  							if($source==$destination){echo "<p style='color:white'>ENTER THE RIGHT DETAILS</p>";}
  							else{?>
  							<script>document.getElementById('details').className="collapse in";</script>

  							<?php
  							$query="select p.psid,p.name,s.traveldate,s.departtime,s.arrivetime from passenger as p natural join schedule as s natural join route as r where r.source='$source' and r.destination='$destination' and p.email='$email';";
  							$result=pg_query($db,$query);
  							if(pg_num_rows($result)==0){echo "<p style='color:white'>NO AVAILABLE BOOKINGS WITH THESE DETAILS</p>";}
  							else{echo "<p style='color:white'>CHECK YOUR FLIGHTS </p>";
  									$x=0;
  									//$ids=array();
                    ?>
                    <div style="color: white">PSID &nbsp;&nbsp;&nbsp;&nbsp;NAME&nbsp;&nbsp;&nbsp;&nbsp;TRAVEL DATE&nbsp;&nbsp;&nbsp;&nbsp;DEPARTTIME&nbsp;&nbsp;&nbsp;&nbsp;ARRIVETIME</div>
                    <?php
  									while($res=pg_fetch_assoc($result)){
  										?>
  										<div style="color:white" id="<?php echo $res['psid'];?>"><div name="flight[]" id="flight<?php echo $x;?>" style="display: inline-block;"><?php echo $res['psid'];?></div>&nbsp;&nbsp;&nbsp;<?php echo $res['name']?>&nbsp;&nbsp;&nbsp;<?php echo $res['traveldate']?>&nbsp;&nbsp;&nbsp;<?php echo $res['departtime'];?>&nbsp;&nbsp;&nbsp;<?php echo $res['arrivetime'];?>&nbsp;&nbsp;&nbsp;
  									<?php 
  									 $x=$x+1; }
  						}}
  						}
  						  						?>
  						<!--<script type="text/javascript">
  							//document.getElementByName("cancelling").onclick=function(){cancel(this);}
  							alert(document.getElementByName("cancelling"));
  							function cancel(flight){

  								var x=flight.id[6];
  								//alert(x);
  								var id='flight'+x;
  								var name=document.getElementById(id).innerHTML;
  								sessionStorage.setItem('psid',name);
  								sessionStorage.setItem('cancel',flight.name);
  								alert(sessionStorage.getItem('cancel'));
  								alert("<?php //echo isset($_POST['cancel2'])?>");
  								sessionStorage.setItem('num',x);
  							}
  						</script>-->
  						
  						
  								
  							
  							

					</div>

  							
  						  						
			</div>
</div>
<div class="copyright">
			<p>© 2019 GoJet Airways. All rights reserved | 
		</p>
	</div>

	</div>
</div>


</body></html>