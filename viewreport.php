<?php
session_start();
$aid= $_SESSION['aid'];
if(empty($aid))
{
	echo "<script>window.location.href='Homepage.php#admin'</script>";
}
else
{
	include('complaint.php');
	include('connect.php');
	?>
	<script>
function visit()
{
	
 var dt1=document.getElementById('d1').value;
 
  
  window.location.href="pie-chart_2.php?aid="+dt1;
  
}

</script>
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">View Employee Reports</h2>
       <hr style="width:200px" class="w3-opacity">
	   


 
<select type="text" class="w3-input w3-padding-16"  style='width:50%'  name="d1" id="d1" required>
      <option value=''>Select Employee Id</option>
  <?php
 $sql5="select distinct eid from employee";


  //$cnt=$cnt+1;
 $res = $con->query($sql5);
while($row = $res->fetch_assoc()) 
{?>
	<option value="<?php echo $row['eid'] ?>"/><?php echo $row['eid'] ?></option>
 
	<?php }
	
	
?>
</select>
<br>
 <input type='button' value="View" id='b1' class="w3-btn w3-light-green w3-padding-large" onclick='visit()'>
</center>
 </div>
 </div>
 </form>
 </body>
 <?php
}
?>