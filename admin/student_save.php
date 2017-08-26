<?php 
include('session.php');
	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$email = $_POST['email'];
	$cys = $_POST['cys'];
	$idno = $_POST['idno'];
	
	$query=mysqli_query($con,"select * from member where member_last='$last' and member_first='$first'")or die(mysqli_error());
		$count=mysqli_num_rows($query);
		
		if($count>0)
		{
			echo "<script type='text/javascript'>alert('Student already added!');</script>";
			echo "<script>document.location='student.php'</script>";   
		}
		else
		{
		mysqli_query($con,"INSERT INTO member(member_last,member_first,email,cys,member_pic,member_type,id_no) VALUES('$last','$first','$email','$cys','default.gif','student','$idno')")or die(mysqli_error());  
	
			echo "<script type='text/javascript'>alert('Successfully added new student member!');</script>";
			echo "<script>document.location='student.php'</script>";   
		}
	
?>