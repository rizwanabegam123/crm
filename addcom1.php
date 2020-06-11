<?php
session_start();
$cids= $_SESSION['cust_id'];
if(empty($cids))
{
	echo "<script>window.location.href='Homepage.php#admin'</script>";
}
else
{
	include('custmenu.php');
	include('connect.php');
	?>
	<script>
	 function duration()
	 {
		 var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      
	  document.getElementById("name").innerHTML = xhttp.responseText;
    }
  };
  
  var cid=document.getElementById("cid").value;
  xhttp.open("GET", "cname.php?cid="+cid, true);
  xhttp.send();
	 }
	 </script>
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
  var cid=document.getElementById("cid").value;
  
  xhttp.open("GET", "comp.php?cid="+cid, true);
  xhttp.send();
	 }
	 </script>
	
	</script>
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">Add Complaint</h2>
       <hr style="width:200px" class="w3-opacity">
<select type="text" class="w3-input w3-padding-16"  style='width:50%' onchange='duration();BT()' name='cid' id='cid' required>
   <option value=''>Select Customer_Id</option>
  <?php
 $sql5="select distinct cust_id from customers";


  //$cnt=$cnt+1;
 $res = $con->query($sql5);
while($row = $res->fetch_assoc()) 
	
{?>
	<option value="<?php echo $row['cust_id'] ?>"/><?php echo $row['cust_id'] ?></option>
 
	<?php }
	
	
?>
</select>
<br>
<div id='name'></div>
	   
	  <p><textarea class="w3-input w3-padding-16" rows='4' placeholder="Enter Complaint"  name="complaint" style='width:50%;color:black' required></textarea></p>
      <p><input class="w3-input w3-padding-16" type="date" placeholder="Complaint Date" name="cdate" style='width:50%' required></p>
       <br><button class="w3-btn w3-light-green w3-padding-large" type="submit" name='add'>
        Add Complaint
        </button>
	</center>
</div>
<div id='cb' align='center'></div>
</div>
<?php
if(isset($_POST['add']))
{
	
	  $var="select max(comid) as max from complaint";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);
       $comid = $row['max'] + 1; 
	   
	   
	$cid =$_POST['cid'];
	$cname=$_POST['cname'];
	$complaint=$_POST['complaint'];
	$cdate=$_POST['cdate'];
	
	
	$sql="Insert into complaint values('$comid','$cid','$cname','$complaint','$cdate','','','','','No','0')";
	if(mysqli_query($con,$sql))
	  {
		echo "<script>alert('Complaint added successfully');</script>";
		echo "<script>location.replace('addcom1.php');</script>";

        }
}

?>
</form>
</body>
<?php	
}
?>
