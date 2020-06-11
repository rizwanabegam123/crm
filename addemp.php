<?php
session_start();
$aid= $_SESSION['aid'];
if(empty($aid))
{
	echo "<script>window.location.href='Homepage.php#admin'</script>";
}
else
{
	include('employee.php');
	include('connect.php');
	?>
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">Add Employee</h2>
       <hr style="width:200px" class="w3-opacity">
	  <p><input class="w3-input w3-padding-16" type="text" placeholder="Employee Id"  name="eid" style='width:50%' required></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Employee Name" pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" name="ename" style='width:50%' required ></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Employee Contact" name="econtact" pattern="[0-9]{10}" title="Please Enter Valid Contact No"  style='width:50%' required></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Employee Email-Id" name="email" style='width:50%' pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Please Enter valid email Address" required></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Region" name="region" style='width:50%' pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required></p>
  <br><button class="w3-btn w3-light-green w3-padding-large" type="submit" name='add'>
        ADD
        </button>
	</center>
</div>
</div>
<?php
if(isset($_POST['add']))
{
	
	   
	$eid =$_POST['eid'];
	$ename=$_POST['ename'];
	$econtact=$_POST['econtact'];
	$email=$_POST['email'];
	$region=$_POST['region'];
	
	$sql="Insert into employee values('$eid','$ename','$econtact','$email','$region')";
	if(mysqli_query($con,$sql))
	  {
		echo "<script>alert('Employee added successfully');</script>";
		echo "<script>location.replace('addemp.php');</script>";

        }
}

?>
</form>
</body>
<?php	
}
?>
