<?php
include('../includes/dbcon.php');

 $query = mysqli_query($con,"SELECT answer_status,COUNT(answer_status) FROM `question_order` group by answer_status");

 
$category = array();
$category['name'] = 'Status';
 
$series1 = array();
$series1['name'] = 'Count';
 
 
 
while($r = mysqli_fetch_array($query)) {
   $category['data'][] = $r['0'];
   $series1['data'][] = $r['1'];

   
}
 
$result = array();
array_push($result,$category);
array_push($result,$series1);
 
print json_encode($result, JSON_NUMERIC_CHECK);
 
mysqli_close($con);
?>