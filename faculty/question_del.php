<?php include('session.php');

	include('../includes/dbcon.php');

	$question_id=$_REQUEST['question_id'];
	$qid=$_REQUEST['qid'];
	// sending query

	$query=mysqli_query($con,"select * from question where question_id='$question_id'")or die(mysqli_error());
			$row=mysqli_fetch_array($query);
			
				$p=$row['points'];	
				if (($row['question_type']=='Matching Type') or ($row['question_type']=='Enumeration'))
				{
					$count=mysqli_query($con,"select * from answer where question_id='$question_id'")or die(mysqli_error());
						$result=mysqli_num_rows($count);
						$pts=$p*$result;
						mysqli_query($con,"UPDATE quiz SET quiz_total=quiz_total-'$pts' where quiz_id='$qid'")or die(mysqli_error($con)); 
				}
			

			

	mysqli_query($con,"DELETE FROM question WHERE question_id = '$question_id'")
	or die(mysqli_error());
	mysqli_query($con,"DELETE FROM answer WHERE question_id = '$question_id'")
	or die(mysqli_error());
  	
//	echo "<script type='text/javascript'>alert('Successfully deleted a question!');</script>";
	echo "<script>document.location='create_quiz.php?qid=$qid'</script>";
?>										

