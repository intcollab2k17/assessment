<?php include('session.php');

if (isset($_POST['save']))
{
	$id=$_SESSION['id'];
	$title = $_POST['title'];
	$group = $_POST['group'];
	$desc = $_POST['desc'];
	$duration = $_POST['duration'];
	//$points = $_POST['points'];
	$date=date("Y-m-d",strtotime($_POST['date']));
	$time=date("H:i",strtotime($_POST['time']));
	
	mysqli_query($con,"INSERT INTO quiz(quiz_title,quiz_duration,member_id,quiz_instruction) 
		VALUES('$title','$duration','$id','$desc')")or die(mysqli_error($con));
	
	$qid=mysqli_insert_id($con);
		 
		  foreach($group as $chk1) {	
			  mysqli_query($con,"INSERT INTO group_quiz(quiz_id,group_id,group_quiz_stat,quiz_date,quiz_time) VALUES('$qid','$chk1','inactive','$date','$time')")or die(mysqli_error($con));
			  }
		  echo "<script type='text/javascript'>alert('Successfully created new quiz!');</script>";
			  echo "<script>document.location='create_quiz.php?qid=$qid'</script>";   
	
}	
?>