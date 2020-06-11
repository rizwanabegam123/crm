<?php
session_start();
$aid= $_SESSION['aid'];
$cid=$_GET['cid'];
if(empty($aid))
{
	echo "<script>window.location.href='Homepage.php#admin'</script>";
}
else
{
	include('customer.php');
	include('connect.php');
	$sel="select * from customers where cust_id='$cid'";
	$rel=$con->query($sel);
	$data=mysqli_fetch_assoc($rel);
	?>
	<script>
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
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about" style='border:1px solid black'>
    <center>
	   <h2 class="w3-text-light-green">Edit Customer Details</h2>
       <hr style="width:200px" class="w3-opacity">
	  <table border='0' class='w3-content w3-justify w3-text-grey' width='90%' align='center'>
	  <tr align='center'>
	  <td>
	  <label><b>Personal Details</b></label>
      <p><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['cname']?>' name="cname" style='width:50%'></p>
      <p><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['contact']?>' name="contact" style='width:50%'></p>
      <p><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['email']?>' name="email" style='width:50%'></p>
      <p><input class="w3-input w3-padding-16" type="number" value='<?php echo $data['age']?>' name="age" style='width:50%'></p>
	   <p><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['region']?>' name="region" style='width:50%'></p>
	  </td>
	  </tr>
	  </table>
	  
	  <table border='0' class='w3-content w3-justify w3-text-grey' width='90%' align='center'>
	  <tr align='center'>
	  <td>
	  <label><b>Business Details</b></label>
	  </td>
	  </tr>
	  <tr align='center'>
	  <td>
	  <select type="text" class="w3-input w3-padding-16" name='business'  style='width:50%'>
		<?php 
	  echo "<option>".$data['business']."</option>";

 ?>
  
     <option value='YES'>YES</option>
    <option value='NO'>NO</option>
	</select>
	</td>
	</tr>
	</table>
	<br>
	<table border='0' class='w3-content w3-justify w3-text-grey' width='90%' align='center'>
	 <tr align='center'>
	  <td>
	  <label><b>Business Type</b></label>
	  </td>
	  </tr>
	<tr align='center'>
	<td>
	    <select type="text" class="w3-input w3-padding-16"  name='bn'  style='width:50%'>
		<?php 
	  echo "<option>".$data['btype']."</option>";

 ?>
   
     <option value='small'>Small</option>
    <option value='medium'>Medium</option>
	<option value='large'>Large</option>
	<option value='NO'>NO</option>
	</select>
	</td>
	</tr>
	</table>
	<br>
	
	<table border='0' class='w3-content w3-justify w3-text-grey' width='90%' align='center'>
	 <tr align='center'>
	  <td>
	  <label><b>Plan Details</b></label>
	  </td>
	  </tr>
	<tr align='center'>
	<td>
	<select type="text" class="w3-input w3-padding-16"  style='width:50%' onchange="duration()" name='plan' id='plan'>
 <?php 
    
	  echo "<option>".$data['plan']."</option>";

 ?>
  <option >Select Plan</option>
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
</td>
</tr>
</table>

<br>


<table border='0' class='w3-content w3-justify w3-text-grey' width='90%' align='center'>
<tr align='center'>
<td>
 <p><label><b>Expiry Date</b></label><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['expiry']?>' name="exp" style='width:50%'></p>
	  
  <div id="date"></div>
  </td>
  </tr>
  <tr align='center'>
  <td colspan='2'>
  <br><button class="w3-btn w3-light-green w3-padding-large" type="submit" name='Update'>
        Update
        </button>
		</td>
		</tr>
		</table>
	</center>
</div>
</div>
<?php
if(isset($_POST['Update']))
{
	$cname=$_POST['cname'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$age=$_POST['age'];
	
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
	$plan=$_POST['plan'];
	if($_SESSION['date']==1)
	{
    $expiry=$_POST['expiry'];
	}
	else
	{
		$expiry=$data['expiry'];
	}
	$sql="update customers set cname='$cname',contact='$contact',email='$email',age='$age',business='$business',btype='$bn',region='$region',plan='$plan',expiry='$expiry' where cust_id='$cid'";
	if(mysqli_query($con,$sql))
	  {
		echo "<script>alert('Customer Details updated successfully');</script>";
		echo "<script>location.replace('editcust.php');</script>";
		unset($_SESSION['date']);

        }
}

?>
</form>
</body>
<?php	
}
?>
