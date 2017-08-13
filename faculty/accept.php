<?php include('session.php');

 $id = $_SESSION['id'];
 $gid = $_REQUEST['gid'];
 $eid = $_REQUEST['eid'];

 mysqli_query($con,"UPDATE enrol SET status='approved' where enrol_id='$eid'")
 or die(mysqli_error($con)); 
 
$query1=mysqli_query($con,"select * from enrol natural join member where enrol_id='$eid'")or die(mysqli_error($con));
	
	$row=mysqli_fetch_array($query1);
		$mid=$row['member_id'];
		$notif="Request to join group approved";
		$link="view_group.php?gid=$gid";	

				    	mysqli_query($con,"INSERT INTO notif(notif,group_id,link,status) VALUES('$notif','$gid','$link','student')")or die(mysqli_error($con));

				    	$nid=mysqli_insert_id($con);
				    
				    	mysqli_query($con,"INSERT INTO notif_stat(notif_id,member_id,read_status) VALUES('$nid','$mid','0')")or die(mysqli_error($con));		   
	    echo "<script>document.location='view_group.php?gid=$gid'</script>";
 
 ?>
