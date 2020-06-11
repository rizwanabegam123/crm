<?php
session_start();
$eid= $_SESSION['eid'];
$comid=$_GET['comid'];
if(empty($eid))
{
	echo "<script>window.location.href='Homepage.php#employee'</script>";
}
else
{
	include('empmenu.php');
	include('connect.php');
	$sel="select * from complaint where comid='$comid'";
	$rel=$con->query($sel);
	$data=mysqli_fetch_assoc($rel);
	?>
	
<body>
<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-text-grey w3-padding-64" style="padding-left:250px" id="about" >
 
	   <h2 class="w3-text-light-green">Solve Complaint Details</h2>
       <hr style="width:200px" class="w3-opacity">
	   
	  <p><label><b>Complaint Id</b></label><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['comid']?>'  name="comid" style='width:50%' readonly></p>
      <p><label><b>Customer Name</b></label><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['cname']?>'  name="cname" style='width:50%' readonly></p>
      <p><label><b>Complaint</b></label><input class="w3-input w3-padding-16" type="text" value='<?php echo $data['complaint']?>' name="complaint" style='width:50%' readonly></p>
      <p><label><b>Enter Solution</b></label><textarea class="w3-input w3-padding-16" rows='4' placeholder="Enter Solution"  name="solution" style='width:50%;color:black'></textarea></p>
    <p><label><b>Employee Id</b></label><input class="w3-input w3-padding-16" rows='4' value='<?php echo $eid ?>' placeholder="Enter Solution"  name='eid' id='eid' style='width:50%;color:black' readonly></p>
    

  <p><label><b>Complaint Solved Date</b></label><input class="w3-input w3-padding-16" type="date"  name="sdate" style='width:50%' required></p>
     
  <br><button class="w3-btn w3-light-green w3-padding-large" type="submit" name='Solve'>
       Solve
        </button>
	
</div>
</div>
<?php
if(isset($_POST['Solve']))
{
	$solution=$_POST['solution'];
	$eid=$_POST['eid'];
	$sdate=$_POST['sdate'];
	
	$sel="select * from employee where eid='$eid'";
	$rel=$con->query($sel);
	$row=mysqli_fetch_assoc($rel);
	$ename=$row['ename'];
	
	$sql="update complaint set solution='$solution',empid='$eid',ename='$ename',sdate='$sdate',status='solved' where comid='$comid'";
	if(mysqli_query($con,$sql))
	  {
		
		require("class.phpmailer.php");
				                    require ('PHPMailerAutoload.php');

		$sql="select email,cname from customers where cust_id='".$data['cust_id']."'";
								$res=$con->query($sql);
									
								while($row=$res->fetch_assoc())
								{
									$sel1="select * from complaint where comid='$comid'";
	                                  $rel1=$con->query($sel1);
	                                $row1=mysqli_fetch_assoc($rel1);
								      $mail1=$row['email'];
					$body="Complaint Details: ".$data['complaint']." <br/> Complaint Date: ".$data['cdate']." <br/>
					
					Solution Details:".$row1['solution']."<br> Solved Date: ".$row1['sdate']."<br>Give Ratings for your complaint solving<br>
					<a href='localhost/Internet/thankyou.php?comid=".$comid."&rate=1'>
					<button style='background-color:blue;color:white'>
					1</button></a>
					<a href='localhost/Internet/thankyou.php?comid=".$comid."&rate=2'>
					<button style='background-color:blue;color:white'>2</button></a>
					<a href='localhost/Internet/thankyou.php?comid=".$comid."&rate=3'>
					<button style='background-color:blue;color:white'>3</button></a>
					<a href='localhost/Internet/thankyou.php?comid=".$comid."&rate=4'>
					<button style='background-color:blue;color:white'>4</button></a>
					<a href='localhost/Internet/thankyou.php?comid=".$comid."&rate=5'>
					<button style='background-color:blue;color:white'>5</button></a>
					" ;

					$mail = new PHPMailer(); 
						$mail->IsSMTP(); // send via SMTP
						//IsSMTP(); // send via SMTP
						$mail->SMTPAuth = true; // turn on SMTP authentication
										$mail->Host = "smtp.gmail.com"; 
										$mail->Port=587;
										//$mail->Host="localhost";
										$mail->Username = "suyashprabhu14@gmail.com"; // SMTP username
										$mail->Password = "gogavekar"; // SMTP password
										$webmaster_email = "suyashprabhu14@gmail.com"; //Reply to this email ID
						$email=$mail1; // Recipients email ID
						
						$name=$row['cname']; // Recipient's name
						$mail->From = $webmaster_email;
						$mail->FromName = "Complaint Solved Mail";
						$mail->AddAddress($email,$name);
						$mail->AddReplyTo($webmaster_email,"Complaint Solved Mail");
						$mail->WordWrap = 50; // set word wrap
						//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
						//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
						$mail->IsHTML(true); // send as HTML
						$mail->Subject = "Complaint Solved Mail";
						$mail->Body = $body ; //HTML Body
						$mail->AltBody = ""; //Text Body
						if(!$mail->Send())
						{
							$flag=0;
						echo "Mailer Error: " . $mail->ErrorInfo;
						}
						else
						{
							$flag=1;							
						}
				}
			
			if($flag==1)
			{
				echo "<script>alert('Email has been sent to customer');</script>";
				echo "<script>location.replace('solvecom.php');</script>";
			}
        }
}

?>
</form>
</body>
<?php	
}
?>
