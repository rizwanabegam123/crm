<?php 
include("connect.php");
$bn=$_GET['bn'];

if($bn=="YES")
{
	echo "<br><select type='text' class='w3-input w3-padding-16' name='bn' style='width:50%' required>
   <option value=''>Select Business Type </option>
     <option value='Small'>Small</option>
    <option value='Medium'>Medium</option>
	   <option value='Large'>Large</option>
	</select>";
}
else
{
	
}
?>