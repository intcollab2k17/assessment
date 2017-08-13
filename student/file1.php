<?php 
include('session.php');
date_default_timezone_set("Asia/Manila");

$qid=$_SESSION['qid']; 

$query =mysqli_query($con,"SELECT question_id,q_order,answer_status, SUM(IF(answer_status='1',1,0)) as correct, SUM(IF(answer_status='0',1,0)) as wrong from question_order where quiz_id='$qid' group by question_id")or die(mysqli_error($con));
 
$category = array();
$category['name'] = 'Question';
 
$series1 =array();
$series1['name'] = 'Correct';
 
$series2 = array();
$series2['name'] = 'Wrong';
 
 
while($r = mysqli_fetch_array($query)) {
   $category['data'][] = "Question # ".$r['q_order'];
   $series1['data'][] = $r['correct'];
   $series2['data'][] = $r['wrong'];

}
 
$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);

 
print json_encode($result, JSON_NUMERIC_CHECK);
 
mysqli_close($con);
?>

