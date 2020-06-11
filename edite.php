<?php
session_start();
$aid= $_SESSION['aid'];
$eid=$_GET['eid'];
if(empty($aid))
{
	echo "<script>window.location.href='Homepage.php#admin'</script>";
}
else
{
	include('employee.php');
	include('connect.php');
	$sel="select * from employee where eid='$eid'";
	$rel=$con->query($sel);
	$data=mysqli_fetch_assoc($rel);
	?>
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">Edit Employee Details</h2>
       <hr style="width:200px" class="w3-opacity">
	  
      <p><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['ename']?>' name="ename" style='width:50%' pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required></p>
      <p><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['contact']?>' name="econtact" style='width:50%' pattern="[0-9]{10}" title="Please Enter Valid Contact No" required></p>
      <p><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['email']?>' name="email" style='width:50%' pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Please Enter valid email Address" required></p>
      <p><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['region']?>' name="region" style='width:50%' pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required></p>
  <br><button class="w3-btn w3-light-green w3-padding-large" type="submit" name='Update'>
        Update
        </button>
	</center>
</div>
</div>
<?php
if(isset($_POST['Update']))
{
	
	   
	
	$ename=$_POST['ename'];
	$econtact=$_POST['econtact'];
	$email=$_POST['email'];
	$region=$_POST['region'];
	
	$sql="update employee set ename='$ename',contact='$econtact',email='$email',region='$region' where eid='$eid'";
	if(mysqli_query($con,$sql))
	  {
		echo "<script>alert('Employee Details updated successfully');</script>";
		echo "<script>location.replace('editemp.php');</script>";

        }
}

?>
</form>
</body>
<?php	
}
?>
