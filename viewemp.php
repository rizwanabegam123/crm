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
	   <h2 class="w3-text-light-green">View Employee</h2>
       <hr style="width:200px" class="w3-opacity">
	   
	   <?php
	   $sel="select * from employee";
	   $res=$con->query($sel);
	   if(mysqli_num_rows($res)==0)
	   {
		   echo "no data found";
	   }
	   else
	   {
		   echo"
		   <div class='w3-container'>
	   <table class='w3-table-all w3-hoverable' cellspacing='0' cellpadding='0' width='80%' >
	   <thead>
        <tr class='w3-light-green'>
	   <th>Emp-Id</th>
	   <th>Emp-Name</th>
	   <th>Emp-Contact</th>
	   <th>Emp-Email</th>
	   <th>Emp-Region</th>
		</tr>
    </thead>   ";
		   while($data=mysqli_fetch_array($res))
		   {
			   $eid=$data['eid'];
	  $ename=$data['ename'];
	  $contact=$data['contact'];
	  $email=$data['email'];
	  $region=$data['region'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center'>
        <td>".$eid."</td>
        <td>".$ename."</td>
        <td>".$contact."</td>
		<td>".$email."</td>
		<td>".$region."</td>
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