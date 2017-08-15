<?php 
include('session.php');
error_reporting(0);
include('../includes/dbcon.php');

	$question_id=$_POST['question_id'];
	$qorder=$_POST['qorder'];
	$answer=$_POST['answer'];
	$oid=$_POST['order_id'];
	$sid=$_SESSION['id'];
	$quiz_id=$_SESSION['quiz_id'];
	$type=$_POST['type'];
	$answer_status=0;

  if (isset($_POST['next'])){

		 	$query1=mysqli_query($con,"select * from answer natural join question where question_id='$question_id'")or die(mysqli_error($con));
				  $row1=mysqli_fetch_array($query1);
				    $correct=$row1['answer'];
				    $score=$row1['points'];
	        
		  if($correct==$answer)
		  {
		    
		    mysqli_query($con,"update question_order set answer='$answer',q_score='$score',answer_status='1' where order_id='$oid'")or die(mysqli_error($con));  
		  }
		  else
		  {
		    mysqli_query($con,"update question_order set answer='$answer',q_score='0',answer_status='0' where order_id='$oid'")or die(mysqli_error($con));  
		  }
		    $next=$qorder+1;
		    $query1=mysqli_query($con,"select * from question_order where quiz_id='$quiz_id' and member_id='$sid' and q_order='$next'")or die(mysqli_error($con));
			$row2=mysqli_fetch_array($query1);
			$_SESSION['question_id']=$row2['question_id'];
			echo "<script>document.location='take_quiz.php'</script>";   
	}
   
else{		   
	  $date=date("Y-m-d");
	  $points=mysqli_query($con,"select *,SUM(points) as spoints from question where quiz_id='$quiz_id'")or die(mysqli_error($con));	
			$row4=mysqli_fetch_array($points);
			$total=$row4['spoints'];
	
			$scorequery=mysqli_query($con,"select *,SUM(q_score) as score from question_order where quiz_id='$quiz_id' and member_id='$sid'")or die(mysqli_error($con));
			  $rowpt=mysqli_fetch_array($scorequery);
			  $score=$rowpt['score'];
			  
		
		$class=mysqli_query($con,"select group_id from group_quiz natural join enrol where quiz_id='$quiz_id' and member_id='$sid'")or die(mysqli_error($con));
			  $classrow=mysqli_fetch_array($class);
			  $group_id=$classrow['group_id'];
			  
		$t=mysqli_query($con,"select * from quiz where quiz_id='$quiz_id'")or die(mysqli_error($con));
			  $trow=mysqli_fetch_array($t);
			  $tpts=$trow['quiz_total'];


		mysqli_query($con,"insert into grade(member_id,group_id,score,total,type,quiz_id) values ('$sid','$group_id','$score','$tpts','quiz','$quiz_id')")or die(mysqli_error($con));  
		$id = mysqli_insert_id($con);

		mysqli_query($con,"insert into quiz_result (quiz_id,member_id,quiz_taken,grade_id) values ('$quiz_id','$sid','$date','$id')")or die(mysqli_error($con));  
		 
		 echo "<script>document.location='result.php'</script>";   
	 
   }
?>