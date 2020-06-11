<?php
session_start();
$aid= $_SESSION['aid'];
if(empty($aid))
{
	echo "<script>window.location.href='Homepage.php#admin'</script>";
}
else
{
	include('adminmenu.php');
	include('connect.php');
	?>
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">Create Plan</h2>
       <hr style="width:200px" class="w3-opacity">
	     <p><input class="w3-input w3-padding-16" type="text" placeholder="Enter Plan Name"  name="pname" style='width:50%' required></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Enter Speed Limits" name="speed" style='width:50%' required></p>
        <p><input class="w3-input w3-padding-16" type="text" placeholder="Enter Cost" name="cost" pattern="[0-9]*$" title="Enter price in numbers" style='width:50%' required></p>
        <p><input class="w3-input w3-padding-16" type="text" placeholder="Enter Duration in days" pattern="[0-9]*$" title="Enter days in numbers" name="duration" style='width:50%' required></p>
  <br><button class="w3-btn w3-light-green w3-padding-large" type="submit" name='plan'>
         Create
        </button>
	</center>
</div>
</div>
<?php
if(isset($_POST['plan']))
{
	
	   $var="select max(pid) as max from plan";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);
	$pid = $row['max'] + 1;
	$pname=$_POST['pname'];
	$speed=$_POST['speed'];
	$cost=$_POST['cost'];
	$duration=$_POST['duration'];
	
	$sql="Insert into plan values('$pid','$pname','$speed','$cost','$duration')";
	if(mysqli_query($con,$sql))
	  {
		echo "<script>alert('Plan Created successfully');</script>";
		echo "<script>location.replace('createplan.php');</script>";

        }
}

?>
</form>
</body>
<?php	
}
?>
