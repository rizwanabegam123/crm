<?php 
session_start();
include("connect.php");

$plan=$_GET['plan'];
if(!empty($plan))
{
	
	$sel="select duration from plan where pname='$plan'";
	$res=$con->query($sel);
	$data=$res->fetch_assoc();
	$date=date('Y-m-d', strtotime("+".$data['duration']." days"));
	$_SESSION['date']= 1 ;
?>
 <p> <label><b>New Expiry Date</b></label><input class='w3-input w3-padding-16' type='text' name='expiry' value='<?php echo $date ?>' style='width:50%'readonly></p>
<?php
}
else{
}
?>