<?php 
include('session.php');
include('../includes/dbcon.php');
	
	$gid = $_POST['gid'];
	$id=$_SESSION['id'];

	$query=mysqli_query($con,"select * from enrol where group_id='$gid' and member_id='$id'")or die(mysqli_error());
		$count=mysqli_num_rows($query);
		
		if($count>0)
		{
			echo "<script type='text/javascript'>alert('You are already enrolled in this group!');</script>";
			echo "<script>document.location='search.php'</script>";   
		}
		else
		{
		mysqli_query($con,"INSERT INTO enrol(group_id,member_id,status) VALUES('$gid','$id','pending')")or die(mysqli_error());

		$name= $_SESSION['name'];  
		$notif="$name requests to join the group";
		$link="view_group.php?gid=$gid";	

				    	mysqli_query($con,"INSERT INTO notif(notif,group_id,link,status) VALUES('$notif','$gid','$link','faculty')")or die(mysqli_error($con));

				    	$nid=mysqli_insert_id($con);

			$query1=mysqli_query($con,"select *,`group`.member_id as mid from enrol left join `group` on enrol.group_id=`group`.group_id where enrol.group_id='$gid' and enrol.member_id='$id'")or die(mysqli_error());
	
				$row1=mysqli_fetch_array($query1);
					$mid=$row1['mid'];
					    
				    	mysqli_query($con,"INSERT INTO notif_stat(notif_id,member_id,read_status) VALUES('$nid','$mid','0')")or die(mysqli_error($con));	

			echo "<script type='text/javascript'>alert('Successfully enrolled in this group! Wait for Faculty enrolment approval');</script>";
			echo "<script>document.location='search.php'</script>";   
		}
	
?>