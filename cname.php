<?php 
session_start();
include("connect.php");

$cid=$_GET['cid'];
if(!empty($cid))
{
	
	$sel="select cname from customers where cust_id='$cid'";
	$res=$con->query($sel);
	$data=$res->fetch_assoc();
	
?>
 <p><input class='w3-input w3-padding-16' type='text' name='cname' value='<?php echo $data['cname']; ?>' style='width:50%' readonly></p>
<?php
}
else{
}
?>