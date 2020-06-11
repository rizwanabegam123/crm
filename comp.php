<?php 
include("connect.php");
$cid=$_GET['cid'];

$sel="select * from complaint where cust_id='$cid'";
$res=$con->query($sel);
	   if(mysqli_num_rows($res)==0)
	   {
		   echo "no data found";
	   }
	   else
	   {
		   echo"<div class='w3-container'>
	   <table border='0' class='w3-table-all w3-hoverable' cellspacing='0' cellpadding='0' width='60%' style='padding-left:50px'>
	   <thead>
        <tr class='w3-light-green'>
	   <th>Complaint Id</th>
	   <th>Cust_Name</th>
	   <th>Cust_Id</th>
	   <th>Complaint</th>
	   <th>Solution</th>
	   
		</tr>
    </thead>   ";
		      while($data=mysqli_fetch_array($res))
		   {
			    $comid=$data['comid'];
	  $cname=$data['cname'];
	  $cid=$data['cust_id'];
	  $complaint=$data['complaint'];
	  $solution=$data['solution'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center' >
        <td>".$comid."</td>
        <td>".$cname."</td>
        <td>".$cid."</td>
		<td>".$complaint."</td>
		<td>".$solution."</td>
		
      </tr>
      
    </tbody>";
		   }
	   }
			   

?>