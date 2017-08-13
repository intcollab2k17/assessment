<?php include('session.php');


	$cys = $_POST['cys'];
	$id = $_SESSION['id'];
	$subject = $_POST['subject'];
	$sem = $_POST['sem'];
	$sy = $_POST['sy'];
	  
	mysqli_query($con,"INSERT INTO `group`(cys,group_stat,member_id,subject_id) 
		VALUES('$cys','Active','$id','$subject')")or die(mysqli_error($con));  
	
	
	
	echo "<script type='text/javascript'>alert('Successfully added new class!');</script>";
	echo "<script>document.location='groups.php'</script>";   
	
	
?>