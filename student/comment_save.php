<?php

include('session.php');
		date_default_timezone_set("Asia/Manila");	
		$id = $_SESSION['id'];
		
		$gpid = $_POST['gpid'];		
		$comment = $_POST['comment'];
		$date = date("Y-m-d H:i:s");

		mysqli_query($con,"INSERT INTO comment(member_id, group_post_id,comment,date_posted)
						 VALUES('$id','$gpid','$comment','$date')") or die(mysqli_error());
						 
		//echo "<script type='text/javascript'>alert('Sorry! You are already registered!');</script>";
		echo "<script>document.location='home.php'</script>";

?>

