<html>
<body>
<?php
 include("connect.php");
 $cid=$_GET['cid'];
 $sql="Delete from customers where cust_id='$cid'";

 if(mysqli_query($con,$sql))
 {
	  
	
	 echo "<script>location.replace('delcust.php')</script>" ;
	
 }
 else
 {
	 
 }
 ?>