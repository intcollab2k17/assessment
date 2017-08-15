<?php 
include('session.php');

include('../includes/dbcon.php');
	date_default_timezone_set("Asia/Manila");
	$qid=$_REQUEST['qid'];
	$id=$_SESSION['id'];
	$gid=$_REQUEST['gid'];
	$_SESSION['start']=date("H:i:s");
	$_SESSION['time']=$_REQUEST['time'];
	$time=$_SESSION['time'];
	$_SESSION['end']=date("H:i:s",strtotime("+$time minutes",strtotime($_SESSION['start'])));
	
	$check=mysqli_query($con,"select COUNT(*) as count from question_order where quiz_id='$qid' and member_id='$id'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($check);
	  if ($row['count']<1)
	    {
	
	$query1=mysqli_query($con,"select * from question where quiz_id='$qid' order by question_id")or die(mysqli_error($con));
		$i=0;
		while($row2=mysqli_fetch_array($query1))
		    {
			$i++;
			$question_id=$row2['question_id'];		      	  
			
			mysqli_query($con,"INSERT INTO question_order(member_id,question_id,q_order,quiz_id,group_id)VALUES('$id','$question_id','$i','$qid','$gid')")or die(mysqli_error($con));  
			
		    }
	}	    
		    $query3=mysqli_query($con,"select * from question_order where quiz_id='$qid' and member_id='$id' and q_order='1'")or die(mysqli_error($con));
				$row3=mysqli_fetch_array($query3);
	
		    $_SESSION['question_id']=$row3['question_id'];
		    $_SESSION['quiz_id']=$qid;

			
		  	
	
?>
<script>
<!--
window.open("take_quiz.php","fs","fullscreen=yes,width=1400,height=840")
document.location='quiz.php'
//-->
</script>