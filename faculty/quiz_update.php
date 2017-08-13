<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
 $qid = $_POST['qid'];
 $title = $_POST['title'];
 $desc = $_POST['desc'];
 $duration = $_POST['duration'];
 $date=date("Y-m-d",strtotime($_POST['date']));
 $time=date("H:i",strtotime($_POST['time']));
 $status = $_POST['status'];
 $gid = $_POST['gid'];

 mysqli_query($con,"UPDATE quiz SET quiz_title='$title',quiz_instruction='$desc',quiz_duration='$duration' where quiz_id='$qid'")
 or die(mysqli_error($con)); 

mysqli_query($con,"UPDATE group_quiz SET quiz_date='$date',quiz_time='$time',group_quiz_stat='$status' where quiz_id='$qid' and group_id='$gid'")
 or die(mysqli_error($con)); 

	echo "<script type='text/javascript'>alert('Successfully updated quiz details!');</script>";
	echo "<script>document.location='quiz.php'</script>";
  
 }
