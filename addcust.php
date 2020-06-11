<?php
session_start();
include('connect.php');
$aid= $_SESSION['aid'];
if(empty($aid))
{
	echo "<script>window.location.href='Homepage.php#admin'</script>";
}
else
{
	include('customer.php');
	
	$var="select max(cust_id) as max from customers";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);

	     $cust_id = $row['max'] + 1;
	?>
	<script>
	 function BT()
	 {
		 var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("cb").innerHTML = xhttp.responseText;
    }
  };
  var un=document.getElementById("business").value;
  
  xhttp.open("GET", "business.php?bn="+un, true);
  xhttp.send();
	 }
	 
	 
	 function duration()
	 {
		 var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      
	  document.getElementById("date").innerHTML = xhttp.responseText;
    }
  };
  
  var plan=document.getElementById("plan").value;
  xhttp.open("GET", "duration.php?plan="+plan, true);
  xhttp.send();
	 }
	 </script>
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">Add Customer</h2>
       <hr style="width:200px" class="w3-opacity">
	  <p><input class="w3-input w3-padding-16" type="text" value=<?php echo $cust_id ?>  value="<?php if (isset($_POST['cid'])) { echo $_POST['cid']; }  ?>" name="cid" style='width:50%' readonly></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Customer Name" name="cname"  value="<?php if (isset($_POST['cname'])) { echo $_POST['cname']; }  ?>" style='width:50%' pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Customer Contact" name="contact" value="<?php if (isset($_POST['contact'])) { echo $_POST['contact']; }  ?>" style='width:50%' pattern="[0-9]{10}" title="Please Enter Valid Contact No" required></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Customer Email-Id" name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; }  ?>" style='width:50%' pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Please Enter valid email Address" required></p>
      <p><input class="w3-input w3-padding-16" type="number" placeholder="Customer Age" name="age" value="<?php if (isset($_POST['age'])) { echo $_POST['age']; }  ?>" style='width:50%' required></p>
	
    <select type="text" class="w3-input w3-padding-16" name='gender' style='width:50%' required>
	<?php if (isset($_POST['gender']))
 {
	  echo "<option>".$_POST['gender']."</option>";
 }
 else
 {
    }
 ?>
    <option value=''>--Select Gender--</option>
    <option class="w3-input">Male</option>
    <option class="w3-input">Female</option>
	</select>
	<br>
	<select type="text" class="w3-input w3-padding-16" id='business' name='business' onchange="BT()" style='width:50%' required>
		<?php if(isset($_POST['business']))
 {
	  echo "<option>".$_POST['business']."</option>";
 }
 else
 {
    }
 ?>
   <option value=''>Business</option>
     <option value='YES'>YES</option>
    <option value='NO'>NO</option>
	</select>
	
  <div id="cb"></div>
  
  <p><input class="w3-input w3-padding-16" type="text" placeholder="Region" name="region" value="<?php if (isset($_POST['region'])) { echo $_POST['region']; }  ?>" style='width:50%' pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required ></p>
	

  <br><button class="w3-btn w3-light-green w3-padding-large" type="submit" name='add'>
        ADD & PROCEED
        </button>

<?php
if(isset($_POST['add']))
{
	
	   

	$cname=$_POST['cname'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$business=$_POST['business'];
	if($business == 'NO')
	{
		$bn='NO';
	}
	else
	{
		$bn=$_POST['bn'];
	}
	$region=$_POST['region'];
	$sql="Insert into customers values('$cust_id','$cname','$contact','$email','$age','$gender','$business','$bn','$region','','0000-00-00')";
	if(mysqli_query($con,$sql))
	  {
		echo "<script>alert('Customers personal details added successfully');</script>";
      }
		?>
<select type="text" class="w3-input w3-padding-16"  style='width:50%' onchange="duration()" name='plan' id='plan' required>
   <option value=''>Select Plan</option>
  <?php
 $sql5="select distinct pname from plan";


  //$cnt=$cnt+1;
 $res = $con->query($sql5);
while($row = $res->fetch_assoc()) 
{?>
	<option value="<?php echo $row['pname'] ?>"/><?php echo $row['pname'] ?></option>
 
	<?php }
	
	
?>
</select>
<?php

	if($bn!='NO')
	{
		$sel="SELECT plan as p, COUNT(*) c FROM customers where btype='$bn' GROUP BY plan HAVING c >1 ";
        $res = $con->query($sel);
		$row = mysqli_fetch_assoc($res);
		$count=$row['p'];
		if(empty($count))
		{
			echo " No Perdiction for plan:";
		}
		else{
		echo "Perdiction for plan:";
		echo $count;
		}
	}
	else if($bn=='NO')
	{
		$sel="SELECT plan as p, COUNT(*) c FROM customers where region='$region' GROUP BY plan HAVING c >1 ";
        $res = $con->query($sel);
		$row = mysqli_fetch_assoc($res);
		$count=$row['p'];
		if(empty($count))
		{
			echo " No Perdiction for plan:";
		}
		else
		{
		echo "Perdiction for plan:";
		echo $count;
		}
		
	}
	else
	{
		$sel="SELECT plan as p, COUNT(*) c FROM customers where age='$age' and gender='gender' GROUP BY plan HAVING c >1 ";
        $res = $con->query($sel);
		$row = mysqli_fetch_assoc($res);
		$count=$row['p'];
		if(empty($count))
		{
			echo " No Perdiction for plan:";
		}
		else
		{
		echo "Perdiction for plan:";
		echo $count;
		}
		
	}
	

?>
	<div id="date"></div>
	<br><button class="w3-btn w3-light-green w3-padding-large" type="submit" name='done'>
        Done
        </button>
<?php
}
if(isset($_POST['done']))
{
	$cid=$_POST['cid'];
    $plan=$_POST['plan'];
    $expiry=$_POST['expiry'];	
    $sql1="update customers set plan='$plan', expiry='$expiry' where cust_id='$cid'";
	if(mysqli_query($con,$sql1))
	  {
		echo "<script>alert('Customers plan details added successfully');</script>";
		echo "<script>location.replace('addcust.php');</script>";
      }
}
?>
	</center>
	
</div>
</div>
</form>
</body>
<?php	
}
?>
