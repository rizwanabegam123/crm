<?php
session_start();
$cids= $_SESSION['cust_id'];
if(empty($cids))
{
	echo "<script>window.location.href='Homepage.php#customer'</script>";
}
else
{
	include('custmenu.php');
	include('connect.php');
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
  var cid=document.getElementById("cid").value;
  
  xhttp.open("GET", "comp.php?cid="+cid, true);
  xhttp.send();
	 }
	 </script>
	 
	 <body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">View Complaint Reports</h2>
       <hr style="width:200px" class="w3-opacity">
	   


 
<select type="text" class="w3-input w3-padding-16"  onchange="BT()" style='width:50%'  name="cid" id="cid" required>
      <option value=''>Select Customer Id</option>
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
 
 <br><br>
 <div id='cb'></div>
 </center>
 </div>
 </div>
 </form>
 </body>
 <?php
}
?>