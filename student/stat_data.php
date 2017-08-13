<?php

include('session.php');
include('../includes/dbcon.php');
$sid=$_SESSION['id'];
$qid=$_SESSION['qid'];
$result = mysqli_query($con,"SELECT * FROM `grade` where quiz_id='$qid' and member_id='$sid'");
	
$rows = array();
$r = mysqli_fetch_array($result);

 $correct=$r['score'];	
 $wrong=$r['total']-$r['score'];	
 $label=array("Correct","Wrong");
 $equiv=array($correct,$wrong);
 $i=0;

 foreach($label as $s)
 {
 	$row[0] = $s;
 	$row[1] = $equiv[$i];
 	$i++;

 	array_push($rows,$row);
 }



print json_encode($rows, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>

