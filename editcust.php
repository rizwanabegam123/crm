<?php
session_start();
$aid= $_SESSION['aid'];
if(empty($aid))
{
	echo "<script>window.location.href='Homepage.php#admin'</script>";
}
else
{
	include('customer.php');
	include('connect.php');
	?>
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <center>
	   <h2 class="w3-text-light-green">Edit Customer</h2>
       <hr style="width:200px" class="w3-opacity">
	   
	   <?php
	   $sel="select * from customers";
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
        <tr class='w3-light-green'>
	   <th>Id</th>
	   <th>Name</th>
	   <th>Contact</th>
	   <th>Email</th>
	   <th>Age</th>
	   <th>Gender</th>
	   <th>Business</th>
	   <th>Type</th>
	   <th>Region</th>
	   <th>Plan</th>
	   <th>Action</th>
		</tr>
    </thead>   ";
		   while($data=mysqli_fetch_array($res))
		   {
			   $cid=$data['cust_id'];
	  $cname=$data['cname'];
	  $contact=$data['contact'];
	  $email=$data['email'];
	  $region=$data['region'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center'>
        <td>".$cid."</td>
        <td>".$cname."</td>
        <td>".$contact."</td>
		<td>".$email."</td>
		<td>".$data['age']."</td>
		<td>".$data['gender']."</td>
		<td>".$data['business']."</td>
		<td>".$data['btype']."</td>
		<td>".$data['region']."</td>
		<td>".$data['plan']."</td>
		<td><a href='editc.php?cid=".$cid."' style='color:green;font-weight:bold'>
         Edit
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