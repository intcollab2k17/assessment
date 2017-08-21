<?php include('session.php');

 $id = $_SESSION['id'];
 $gid = $_POST['gid'];
 $eid = $_POST['eid'];

 mysqli_query($con,"DELETE from enrol where enrol_id='$eid'")
 or die(mysqli_error($con)); 
 
	    echo "<script>document.location='view_group.php?gid=$gid'</script>";
 
 ?>
