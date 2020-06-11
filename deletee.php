<html>
<body>
<?php
 include("connect.php");
 $eid=$_GET['eid'];
 $sql="Delete from employee where eid='$eid'";

 if(mysqli_query($con,$sql))
 {
	  
	
	 echo "<script>location.replace('deletemp.php')</script>" ;
	
 }
 else
 {
	 
 }
 ?>