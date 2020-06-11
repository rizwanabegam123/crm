<?php
session_start();
$aid=$_SESSION['aid'];
#Pie Chart
include("connect.php");

$result ="SELECT empid, rate AS TAHUN, COUNT( * ) AS JUMLAH FROM complaint where empid='$aid' GROUP BY TAHUN ";
$rel=$con->query($result);
#$result = mysql_query("SELECT name, val FROM web_marketing");

//$rows = array();
$rows['type'] = 'pie';
$rows['name'] = 'Pelawat';
//$rows['innerSize'] = '50%';
while ($r=mysqli_fetch_array($rel)) {
    $rows['data'][] = array('rate '.$r['TAHUN'].'"', $r['JUMLAH']);    
}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysqli_close($con);


