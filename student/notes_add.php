<?php 

include('session.php');

	$id=$_SESSION['id'];
	$notes = $_POST['notes'];
	
		mysqli_query($con,"INSERT INTO notes(notes,member_id) VALUES('$notes','$id')")or die(mysqli_error($con));

		  echo "<script>document.location='home.php'</script>";  					
	
?>
