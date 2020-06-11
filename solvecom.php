<?php
session_start();
$eid= $_SESSION['eid'];
if(empty($eid))
{
	echo "<script>window.location.href='Homepage.php#employee'</script>";
}
else
{
	include('empmenu.php');
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
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">Pending Complaints</h2>
       <hr style="width:200px" class="w3-opacity">
	   
	   <?php
	   $sel="select * from complaint where status='No'";
	   $res=$con->query($sel);
	   if(mysqli_num_rows($res)==0)
	   {
		   echo "no data found";
	   }
	   else
	   {
		   echo"
		   <div class='w3-container'>
	   <table border='0' class='w3-table-all w3-hoverable' cellspacing='0' cellpadding='0' width='80%' >
	   <thead>
        <tr class='w3-light-grey'>
	   <th>Complaint Id</th>
	   <th>Cust_Name</th>
	   <th>Complaint</th>
	   <th>Complaint Date</th>
	   <th>Action</th>
		</tr>
    </thead>   ";
		   while($data=mysqli_fetch_array($res))
		   {
			   $comid=$data['comid'];
	  $cname=$data['cname'];
	  $complaint=$data['complaint'];
	  $cdate=$data['cdate'];
	
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center' >
        <td>".$comid."</td>
        <td>".$cname."</td>
        <td>".$complaint."</td>
		<td>".$cdate."</td>
		
		<td>
		<a href='solve.php?comid=".$comid."'>
         Solve
        </a>
		</td>
      </tr>
      
    </tbody>";
		   }
			   
	   }
	   
	   ?>
	   </table>
	   </div>
	   </div>
	   </div>
	   </form>
	   </body>
<?php
}
?>