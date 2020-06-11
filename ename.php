<?php 
session_start();
include("connect.php");

$eid=$_GET['eid'];
if(!empty($eid))
{
	
	$sel="select ename from employee where eid='$eid'";
	$res=$con->query($sel);
	$data=$res->fetch_assoc();
	
?>
 <p><input class='w3-input w3-padding-16' type='text' name='ename' value='<?php echo $data['ename']; ?>' style='width:50%'></p>
<?php
}
else{
}
?>