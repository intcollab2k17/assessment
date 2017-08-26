<?php 
include('session.php');


 $id = $_POST['id'];
 $last = $_POST['last'];
 $first = $_POST['first'];
 $email = $_POST['email'];
 $cys = $_POST['cys'];
 $idno = $_POST['idno'];

 mysqli_query($con,"UPDATE member SET member_last='$last',member_first='$first',email='$email',cys='$cys',id_no='$idno' where member_id='$id'")
 or die(mysqli_error()); 

	echo "<script type='text/javascript'>alert('Successfully updated student details!');</script>";
	echo "<script>document.location='student.php'</script>";
 ?>

