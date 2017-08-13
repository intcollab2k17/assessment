<?php include('session.php');

 if (isset($_POST['update']))
 { 
$gpid = $_POST['gpid'];
$score = $_POST['score'];
$gid = $_POST['gid'];
$grade_id = $_POST['grade_id'];
$total = $_POST['total'];
$member_id = $_POST['member_id'];
$sid = $_POST['sid'];
$pid = $_POST['pid'];
date_default_timezone_set("Asia/Manila"); 
$date=date("Y-m-d");

if($grade_id=="")
{
 mysqli_query($con,"INSERT INTO grade(member_id,group_id,score,total,type,post_id) values ('$member_id','$gid','$score','$total','assignment','$pid')") or die(mysqli_error($con)); 
	
  $gid=mysqli_insert_id($con);
	
  mysqli_query($con,"UPDATE submission SET grade_id='$gid' where submission_id='$sid'")
  or die(mysqli_error()); 

  $query1=mysqli_query($con,"SELECT * from submission where submission_id='$sid'")or die(mysqli_error($con));
  $row1=mysqli_fetch_array($query1);
  $id=$row1['member_id'];
 
  $notif="Submission was already graded";
    $link="progress.php?gid=$gid";    
    mysqli_query($con,"INSERT INTO notif(notif,group_id,link,status) VALUES('$notif','$gid','$link','student')")or die(mysqli_error($con));

    $nid=mysqli_insert_id($con);
    mysqli_query($con,"INSERT INTO notif_stat(notif_id,member_id,read_status) VALUES('$nid','$member_id','0')")or die(mysqli_error($con));  

	echo "<script type='text/javascript'>alert('Successfully added a score!');</script>";
	echo "<script>document.location='submission.php?gpid=$gpid'</script>";
}
else
{
  mysqli_query($con,"UPDATE grade SET score='$score' where grade_id='$grade_id'")
  or die(mysqli_error()); 

  echo "<script type='text/javascript'>alert('Successfully updated the score!');</script>";
  echo "<script>document.location='submission.php?gpid=$gpid'</script>";
}
 } 

