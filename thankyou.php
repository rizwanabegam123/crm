<?php
include("connect.php");
$comid=$_GET['comid'];
$rate=$_GET['rate'];

$sel="update complaint set rate='$rate' where comid='$comid'";
if(mysqli_query($con,$sel))
	  {
		  echo "<center><img src='images/thanku.jpg'></center>";
	  }
?>