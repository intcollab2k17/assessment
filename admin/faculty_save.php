<?php 
include('session.php');

	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$idno = $_POST['idno'];
	
	$query=mysqli_query($con,"select * from member where member_last='$last' and member_first='$first'")or die(mysqli_error());
		$count=mysqli_num_rows($query);
		
		if($count>0)
		{
			echo "<script type='text/javascript'>alert('Faculty already added!');</script>";
			echo "<script>document.location='faculty.php'</script>";   
		}
		else
		{
		mysqli_query($con,"INSERT INTO member(id_no,member_last,member_first,member_pic,member_type) VALUES('$idno','$last','$first','default.gif','Faculty')")or die(mysqli_error($con));  
			echo "<script type='text/javascript'>alert('Successfully added new faculty member!');</script>";
			echo "<script>document.location='faculty.php'</script>";   
		}
	
?>