<?php 
$db = pg_connect("host=localhost dbname=goJetAirways user=postgres password= ");
session_start();
if(isset($_POST['login'])){
$name=$_POST['name'];
$pass=$_POST['password'];
if($name != 'admin'|| $pass != 'qwerty'){ header("Location:login.php");}}
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
		<h1>GoJet Airways Admin Page</h1>
		<div class="header-main" >
			<!--<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>-->
			<!--<div class="container">
				<span class="glyphicon glyphicon-plane" style="color: blue;align: center; font-size: 50px;"></span></div>-->
			<img src="icon.png" style=" display: block;  margin-left: auto;  margin-right: auto;height: 80px;width:80px;border-radius: 50%" ><br><br>
             <div style="color: white;">HEY ADMIN!!!</div><br>
             <div style="color: white;">WELCOME BACK</div><br>
			<div class="header-left-bottom">

				
		<div class="panel-group" id="accordion">	
  
  <a href="#AirCraft" class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" style="width: 100%;background-color: grey;">AirCraft</a><br><br>
  <div id="AirCraft" class="collapse" style="width: 100%">
 
  <div class="tab">
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Add')">Add</button>
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Update')">Update</button>
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Delete')">Delete</button>
</div>
<br><br>
<!--<?php //echo $_SERVER['PHP_SELF'];?>-->
<!-- Tab content -->
<div id="Add" class="tabcontent" style="display:none;">
  <form action="#Add" method="POST">
  	<div class="icon1" style="width:50%; ">
  	<input type="text" placeholder="AcID" name="acid" required style=" padding:0;margin:0;"/></div>
  	<div class="icon1" style="width:50%;">
  	<input type="text" value="Hindustan Aeronautics Limited" name="mfdby" style=" padding:0;" required/>
  </div>
  <div class="icon1" style="width:50%;">
  	<input type="date" name="mfdon" max="<?php echo date('Y-m-d') ?>" style="width:50%; padding:0;" /></div>
  	  	<button type="submit" name="add" >ADD</button>
  	  	  </form>
  	  	  <p style="color: white;" id="addtext"></p>

 <?php
 if(isset($_POST['add'])){
 	?>
 	<script type="text/javascript">
 		document.getElementById('AirCraft').className="collapse in";
 		document.getElementById('Add').style.display="block";
 	</script>
 	<?php
 	$acid=$_POST['acid'];
 	$mfdby=$_POST['mfdby'];
 	$mfdon=$_POST['mfdon'];
 	
 	$query1="select acid from aircraft where acid='$acid' ;";
 	$res=pg_query($db,$query1); 	
 	if(pg_num_rows($res)!=0 || $acid[0]!='K' ){?>
 	<script type="text/javascript">
 		document.getElementById('addtext').innerHTML="Please enter a valid id";
 	</script> 
 <?php }
 	else{
 		$query="insert into aircraft values ('$acid','$mfdby','$mfdon');";
 		$res=pg_query($db,$query);
 		$res=pg_fetch_assoc($res);
 		?>
 		<script type="text/javascript">
 			
 			document.getElementById('addtext').innerHTML="Successfully Added";
 		</script>
 	<?php }
 }


  ?> 	  	
  	  </div>

<div id="Update" class="tabcontent" style="display:none;">
  <form action="#Update" method="POST">
  	<div class="icon1" style="width:50%; ">
  	<input type="text" placeholder="AcID" name="acid" required style=" padding:0;margin:0;"/></div>
  	<div class="icon1" style="width:50%;">
  	<input type="text" value="Hindustan Aeronautics Limited" name="mfdby" style=" padding:0;" required/>
  </div>
  <div class="icon1" style="width:50%;">
  	<input type="date" name="mfdon" max="<?php echo date('Y-m-d') ?>" style="width:50%; padding:0;" /></div>
  	  	<button type="submit" name="update" >UPDATE</button>
  	  	  </form>
  	  	  <p style="color: white;" id="updatetext"></p>

  <?php
 if(isset($_POST['update'])){
 	?>
 	<script type="text/javascript">
 		document.getElementById('AirCraft').className="collapse in";
 		document.getElementById('Update').style.display="block";
 	</script>
 	<?php
 	$acid=$_POST['acid'];
 	$mfdby=$_POST['mfdby'];
 	$mfdon=$_POST['mfdon'];
 	
 	$query1="select acid from aircraft where acid='$acid' ;";
 	$res=pg_query($db,$query1); 	
 	if(pg_num_rows($res)==0 || $acid[0]!='K' ){?>
 	<script type="text/javascript">
 		document.getElementById('updatetext').innerHTML="Please enter a valid id";
 	</script> 
 <?php }
 	else{
 		$query="update aircraft set mfdby='$mfdby' , mdfon='$mfdon' where acid='$acid';";
 		$res=pg_query($db,$query);
 		$res=pg_fetch_assoc($res);
 		?>
 		<script type="text/javascript">
 			
 			document.getElementById('updatetext').innerHTML="Successfully Updated";
 		</script>
 	<?php }
 }


  ?>
</div>

<div id="Delete" class="tabcontent" style="display:none;">
 	<form action="#Delete" method="POST">
  	<div class="icon1" style="width:50%; ">
  	<input type="text" placeholder="AcID" name="acid" required style=" padding:0;margin:0;"/></div>
  	<button type="submit" name="delete" >DELETE</button>
  	  </form>
  	  	  <p style="color: white;" id="deletetext"></p>

  <?php if(isset($_POST['delete'])){
 	?>
 	<script type="text/javascript">
 		document.getElementById('AirCraft').className="collapse in";
 		document.getElementById('Delete').style.display="block";
 	</script>
 	<?php
 	$acid=$_POST['acid'];
 	
 	
 	$query1="select acid from aircraft where acid='$acid' ;";
 	$res=pg_query($db,$query1); 	
 	if(pg_num_rows($res)==0 || $acid[0]!='K' ){?>
 	<script type="text/javascript">
 		document.getElementById('deletetext').innerHTML="Please enter a valid id";
 	</script> 
 <?php }
 	else{
 		$query="delete from aircraft where acid='$acid';";
 		$res=pg_query($db,$query);
 		$res=pg_fetch_assoc($res);
 		?>
 		<script type="text/javascript">
 			
 			document.getElementById('deletetext').innerHTML="Successfully Deleted";
 		</script>
 	<?php }
 }


  ?>

</div>

<br>
</div>

<script type="text/javascript">
	function openCity(evt, opName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(opName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>


  
<a href="#Employee" class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" style="width: 100%;background-color: grey;">Employee</a><br>
    <div id="Employee" class="collapse" style="width: 100%">

      <br>
    <div class="tab">
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Add1')">Add</button>
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Update1')">Update</button>
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Delete1')">Delete</button>
</div>
<br><br>

<br>
<div id="Add1" class="tabcontent" style="display:none;">
  <form action="#Add1" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="EmployeeID" name="empid" required style=" padding:0;margin:0;"/></div>
    <div class="icon1" style="width:50%;">
    <input type="text" placeholder="FirstName" name="firstname" style=" padding:0;" required maxlength="32"/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="LastName" name="lastname" style=" padding:0;" required maxlength="32"/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="Address" name="address" style=" padding:0;" required maxlength="252"/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="number" placeholder="Salary" name="salary" style=" padding:0;" required step=".01" min="10000" max="70000" />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="Role" name="role" style=" padding:0;" required maxlength="32"/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="email" placeholder="Email" name="email" style=" padding:0;" required/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="AcID" name="acid" style=" padding:0;" />
  </div>  
        <button type="submit" name="add1" >ADD</button>
          </form>
          <p style="color: white;" id="addtext1"></p>






    <?php
 if(isset($_POST['add1'])){
  ?>
  <script type="text/javascript">
    document.getElementById('Employee').className="collapse in";
    document.getElementById('Add1').style.display="block";
  </script>
  <?php
  $empid=$_POST['empid'];
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $address=$_POST['address'];
  $salary=$_POST['salary'];
  $role=$_POST['role'];
  $email=$_POST['email'];
  $acid=$_POST['acid'];
  $salary=(float)$salary;

  
  $query1="select acid from aircraft where acid='$acid' ;";
  $res=pg_query($db,$query1);   
  $query2="select empid from employee where empid='$empid' ;";
  $res1=pg_query($db,$query2);
  if((pg_num_rows($res)==0 && $acid!=null)||(pg_num_rows($res1)!=0|| $empid[0]!='E')){
    ?>
  <script type="text/javascript">
    document.getElementById('addtext1').innerHTML="Please enter a valid id";
  </script> 
 <?php }
  else{if($acid!=null)
    {$query="insert into employee values ('$empid','$firstname','$lastname','$address','$salary','$role','$email','$acid');";}

    else{$query="insert into employee values ('$empid','$firstname','$lastname','$address','$salary','$role','$email',null);";}
    $res=pg_query($db,$query);
    $res=pg_fetch_assoc($res);
    ?>
    <script type="text/javascript">
      
      document.getElementById('addtext1').innerHTML="Successfully Added";
    </script>
  <?php }
 }

  ?>      
  </div>

  <div id="Update1" class="tabcontent" style="display:none;">
  <form action="#Update1" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="EmployeeID" name="empid" required style=" padding:0;margin:0;"/></div>
    
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="Address" name="address" style=" padding:0;" maxlength="252"/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="number" placeholder="Salary" name="salary" style=" padding:0;" min="10000" max="70000" step=".01" />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="Role" name="role" style=" padding:0;" maxlength="32"/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="email" placeholder="Email" name="email" style=" padding:0;" />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="AcID" name="acid" style=" padding:0;" />
  </div>          <button type="submit" name="update1" >UPDATE</button>
          </form>
          <p style="color: white;" id="updatetext1"></p>

  <?php
 if(isset($_POST['update1'])){
  ?>
  <script type="text/javascript">
    document.getElementById('Employee').className="collapse in";
    document.getElementById('Update1').style.display="block";
  </script>
  <?php
  $empid=$_POST['empid'];
  
  $address=$_POST['address'];
  $salary=$_POST['salary'];
  $role=$_POST['role'];
  $email=$_POST['email'];
  $acid=$_POST['acid'];
  $salary=(float)$salary;
  
  $query1="select empid from employee where empid='$empid' ;";
  $res=pg_query($db,$query1); 
  $query2="select acid from aircraft where acid='$acid' ;";
  $res2=pg_query($db,$query2);  
  if(pg_num_rows($res)==0 || $empid[0]!='E'|| (pg_num_rows($res2)==0 && $acid!=null && $acid!='none') ){?>
  <script type="text/javascript">
    document.getElementById('updatetext1').innerHTML="Please enter a valid id";
  </script> 
 <?php }
  else{if($salary!=0){$query="update employee set salary='$salary' where empid='$empid';";
            $res=pg_query($db,$query);}
    if($address!=null){$query="update employee set address='$address' where empid='$empid' ;";
              $res=pg_query($db,$query);  }
    if($role!=null){$query="update employee set role='$role' where empid='$empid' ;";
              $res=pg_query($db,$query);}   
    if($email!=null){$query="update employee set email='$email' where empid='$empid' ;";
              $res=pg_query($db,$query);}           
    if($acid=='none'){$query="update employee set acid=null where empid='$empid' ;";
              $res=pg_query($db,$query);}
    else if($acid!=null){$query="update employee set acid='$acid' where empid='$empid' ;";
              $res=pg_query($db,$query);}         
    
    ?>
    <script type="text/javascript">
      
      document.getElementById('updatetext1').innerHTML="Successfully Updated";
    </script>
  <?php }
 }


  ?>
</div>

<div id="Delete1" class="tabcontent" style="display:none;">
  <form action="#Delete1" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="EmployeeID" name="empid" required style=" padding:0;margin:0;"/></div>
    <button type="submit" name="delete1" >DELETE</button>
      </form>
          <p style="color: white;" id="deletetext1"></p>

  <?php if(isset($_POST['delete1'])){
  ?>
  <script type="text/javascript">
    document.getElementById('Employee').className="collapse in";
    document.getElementById('Delete1').style.display="block";
  </script>
  <?php
  $empid=$_POST['empid'];
  
  
  $query1="select empid from employee where empid='$empid' ;";
  $res=pg_query($db,$query1);   
  if(pg_num_rows($res)==0 || $empid[0]!='E' ){?>
  <script type="text/javascript">
    document.getElementById('deletetext1').innerHTML="Please enter a valid id";
  </script> 
 <?php }
  else{
    $query="delete from employee where empid='$empid';";
    $res=pg_query($db,$query);
    $res=pg_fetch_assoc($res);
    ?>
    <script type="text/javascript">
      
      document.getElementById('deletetext1').innerHTML="Successfully Deleted";
    </script>
  <?php }
 }


  ?>

</div>

</div>
<br>

<a href="#Route" class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" style="width: 100%;background-color: grey;">Route</a><br><br>
    <div id="Route" class="collapse" style="width: 100%">
 
  <div class="tab">
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Add2')">Add</button>
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Update2')">Update</button>
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Delete2')">Delete</button>
</div>
<br><br>
  <div id="Add2" class="tabcontent" style="display:none;">
  <form action="#Add2" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="RouteID" name="rtid" required style=" padding:0;margin:0;"/></div>
    <div class="icon1" style="width:50%;">
    <input type="text" placeholder="Source" name="source" style=" padding:0;" required maxlength="32"/>
      </div>
      <div class="icon1" style="width:50%;">
    <input type="text" placeholder="Destination" name="destination" style=" padding:0;" required maxlength="32"/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="number" placeholder="Fare" name="fare" style=" padding:0;" min="1000" max="10000"/>
  </div>
  <button type="submit" name="add2" >ADD</button>
          </form>
<p style="color: white;" id="addtext2"></p>
<?php
  if(isset($_POST['add2'])){?>
    <script type="text/javascript">
    document.getElementById('Route').className="collapse in";
    document.getElementById('Add2').style.display="block";  
    </script>
<?php
    $rtid=$_POST['rtid'];
    $source=$_POST['source'];
    $dest=$_POST['destination'];
    $fare=$_POST['fare'];}

    $query1="select rtid from route where rtid='$rtid';";
  $res=pg_query($db,$query1);
  if(pg_num_rows($res)!=0){?>
  <script type="text/javascript">
    document.getElementById('addtext2').innerHTML="Please enter a valid id";
  </script> 
 <?php }
  else{
    $query="insert into route values ('$rtid','$source','$dest','$fare');";
    $res=pg_query($query);
    ?>
    <script type="text/javascript">
      
      document.getElementById('addtext2').innerHTML="Successfully Added";
    </script>
<?php
  }

?>
</div>

<div id="Update2" class="tabcontent" style="display:none;">
  <form action="#Update2" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="RouteID" name="rtid" required style=" padding:0;margin:0;"/></div>
    <div class="icon1" style="width:50%; ">
<input type="number" placeholder="Fare" name="fare" required></div>
<button type="submit" name="update2" >UPDATE</button>
</form>
          <p style="color: white;" id="updatetext2"></p>

    <?php
 if(isset($_POST['update2'])){
  ?>
  <script type="text/javascript">
    document.getElementById('Route').className="collapse in";
    document.getElementById('Update2').style.display="block";
  </script>    
  <?php  
  $rtid=$_POST['rtid'];
  $fare=$_POST['fare'];

  $query1="select rtid from route where rtid='$rtid';";
  $res=pg_query($db,$query1);
  if(pg_num_rows($res)==0){?>
  <script type="text/javascript">
    document.getElementById('updatetext2').innerHTML="Please enter a valid id";
  </script> 
 <?php }
  else{
    $query="update route set fare='$fare where rtid='$rtid';";
    $res=pg_query($query);
    ?>
    <script type="text/javascript">
      
      document.getElementById('updatetext2').innerHTML="Successfully Updated";
    </script>
  <?php } }?>
 </div>

<div id="Delete2" class="tabcontent" style="display:none;">
  <form action="#Delete2" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="RouteID" name="rtid" required style=" padding:0;margin:0;"/></div>
    <button type="submit" name="delete2" >DELETE</button>
      </form>
          <p style="color: white;" id="deletetext2"></p>

  <?php if(isset($_POST['delete2'])){
  ?>
  <script type="text/javascript">
    document.getElementById('Route').className="collapse in";
    document.getElementById('Delete2').style.display="block";
  </script>
  <?php
  $rtid=$_POST['rtid'];
  
  
  $query1="select rtid from route where rtid='$rtid' ;";
  $res=pg_query($db,$query1);   
  if(pg_num_rows($res)==0){?>
  <script type="text/javascript">
    document.getElementById('deletetext2').innerHTML="Please enter a valid id";
  </script> 
 <?php }
  else{
    $query="delete from route where rtid='$rtid';";
    $res=pg_query($db,$query);
    $res=pg_fetch_assoc($res);
    ?>
    <script type="text/javascript">
      
      document.getElementById('deletetext2').innerHTML="Successfully Deleted";
    </script>
  <?php }
 }


  ?>

</div>

</div>



<a href="#Schedule" class="btn btn-primary" data-toggle="collapse" style="width: 100%;background-color: grey;">Schedule</a><br>

  <div id="Schedule" class="collapse" style="width: 100%">
    <br>
    <div class="tab">
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Add3')">Add</button>
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Update3')">Update</button>
  <button class="tablinks" style="color:black" onclick="openCity(event, 'Delete3')">Delete</button>
</div>

<div id="Add3" class="tabcontent" style="display:none;">
  <form action="#Add3" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="ScheduleID" name="scid" required style=" padding:0;margin:0;"/></div>
    <div class="icon1" style="width:50%;">
    <input type="date" placeholder="TravelDate" name="traveldate" style=" padding:0;" required />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="time" placeholder="DepartTime" name="departtime" style=" padding:0;" required "/>
  </div>
  <div class="icon1" style="width:50%;">
    <input type="time" placeholder="ArriveTime" name="arrivetime" style=" padding:0;" required />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="AircraftID" name="acid" style=" padding:0;" required />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="RouteID" name="rtid" style=" padding:0;" required />
  </div>
  <button type="submit" name="add3" >ADD</button>
</form>
<p style="color: white;" id="addtext3"></p>

<?php
 if(isset($_POST['add3'])){
  ?>
  <script type="text/javascript">
    document.getElementById('Schedule').className="collapse in";
    document.getElementById('Add3').style.display="block";
  </script>
  <?php
  $scid=$_POST['scid'];
  $travel=$_POST['traveldate'];
  $depart=$_POST['departtime'];
  $arrive=$_POST['arrivetime'];
  $acid=$_POST['acid'];
  $rtid=$_POST['rtid'];

  $query1="select acid from aircraft where acid='$acid' ;";
  $res=pg_query($db,$query1);
  $query2="select rtid from employee where rtid='$rtid' ;";
  $res1=pg_query($db,$query2); 
  $query3="select scid from schedule where scid='$scid' ;";
  $res2=pg_query($db,$query3); 
  if(pg_num_rows($res)==0 || pg_num_rows($res1)==0 || pg_num_rows($res2)!=0){
    ?>
    <script type="text/javascript">
    document.getElementById('addtext1').innerHTML="Please enter a valid id";
  </script> 
 <?php 
  }
  else{
    $query="insert into schedule values ('$scid','$travel','$depart','$arrive','$acid','$rtid';";
    $res=pg_query($query);
    $res=pg_fetch_assoc($res);
    ?>
    <script type="text/javascript">
      
      document.getElementById('addtext3').innerHTML="Successfully Added";
    </script>
  <?php
  }}

  ?>


</div>


<div id="Update3" class="tabcontent" style="display:none;">
  <form action="#Update3" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="ScheduleID" name="scid" required style=" padding:0;margin:0;"/></div>
    <div class="icon1" style="width:50%;">
    <input type="date" placeholder="TravelDate" name="traveldate" style=" padding:0;" />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="time" placeholder="DepartTime" name="departtime" style=" padding:0;" />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="time" placeholder="ArriveTime" name="arrivetime" style=" padding:0;"  />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="AircraftID" name="acid" style=" padding:0;"  />
  </div>
  <div class="icon1" style="width:50%;">
    <input type="text" placeholder="RouteID" name="rtid" style=" padding:0;"  />
  </div>
  <button type="submit" name="update3" >UPDATE</button>
</form>
<p style="color: white;" id="updatetext3"></p>

<?php
 if(isset($_POST['update3'])){
  ?>
  <script type="text/javascript">
    document.getElementById('SCHEDULE').className="collapse in";
    document.getElementById('Update3').style.display="block";
  </script>
  <?php
  $scid=$_POST['scid'];
  $travel=$_POST['traveldate'];
  $depart=$_POST['departtime'];
  $arrive=$_POST['arrivetime'];
  $acid=$_POST['acid'];
  $rtid=$_POST['rtid'];


  $query1="select scid from schedule where scid='$scid' ;";
  $res=pg_query($db,$query1); 
  if(pg_num_rows($res)==0){
    ?>
  <script type="text/javascript">
    document.getElementById('updatetext3').innerHTML="Please enter a valid id";
  </script> 
 <?php
  }
  else{
    if($travel!=null){
      $query="update schedule set traveldate='$travel' where scid='$scid';";
      $res=pg_query($db,$query);
    }
      if($depart!=null){
      $query="update schedule set departtime='$depart' where scid='$scid';";
      $res=pg_query($db,$query);
    }
    if($arrive!=null){
      $query="update schedule set arrivetime='$arrive' where scid='$scid';";
      $res=pg_query($db,$query);
    }
    if($acid!=null){
      $query2="select acid from aircraft where acid='$acid' ;";
      $res2=pg_query($db,$query2);  
      if(pg_num_rows($res)==0){
        ?>
  <script type="text/javascript">
    document.getElementById('updatetext3').innerHTML="Please enter a valid id";
  </script> 
 <?php

      }
      else{
      $query="update schedule set acid='$acid' where scid='$scid';";
      $res=pg_query($db,$query);}
    }
      if($rtid!=null){
        $query2="select rtid from route where rtid='$rtid' ;";
      $res2=pg_query($db,$query2);  
      if(pg_num_rows($res)==0){
        ?>
  <script type="text/javascript">
    document.getElementById('updatetext3').innerHTML="Please enter a valid id";
  </script> 
 <?php
}   else{$query="update schedule set rtid='$rtid' where scid='$scid';";
      $res=pg_query($db,$query);}
    }

  
 ?>
 <script type="text/javascript">
      
      document.getElementById('updatetext3').innerHTML="Successfully Updated";
    </script>
    <?php

}}

?></div>
<div id="Delete3" class="tabcontent" style="display:none;">
  <form action="#Delete3" method="POST">
    <div class="icon1" style="width:50%; ">
    <input type="text" placeholder="ScheduleID" name="scid" required style=" padding:0;margin:0;"/></div>
    <button type="submit" name="delete3" >DELETE</button>
      </form>
          <p style="color: white;" id="deletetext3"></p>

  <?php if(isset($_POST['delete3'])){
  ?>
  <script type="text/javascript">
    document.getElementById('Schedule').className="collapse in";
    document.getElementById('Delete3').style.display="block";
  </script>
  <?php
  $scid=$_POST['scid'];
  
  
  $query1="select scid from employee where scid='$scid' ;";
  $res=pg_query($db,$query1);   
  if(pg_num_rows($res)==0 ){?>
  <script type="text/javascript">
    document.getElementById('deletetext3').innerHTML="Please enter a valid id";
  </script> 
 <?php }
  else{
    $query="delete from schedule where scid='$scid';";
    $res=pg_query($db,$query);
    $res=pg_fetch_assoc($res);
    ?>
    <script type="text/javascript">
      
      document.getElementById('deletetext3').innerHTML="Successfully Deleted";
    </script>
  <?php }
 }


  ?>
</div>


</div>




</div>
    

   

</div>
</div>
<div class="copyright">
			<p>© 2019 GoJet Airways. All rights reserved | 
		</p>
	</div>

	</div>
</div>



</body>
</html>