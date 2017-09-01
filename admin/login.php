<?php include('session.php');


$user_unsafe=$_POST['email'];
$pass_unsafe=$_POST['password'];

$email = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,$pass_unsafe);

$query=mysqli_query($con,"select * from admin where admin_email='$email' and admin_password='$pass'")or die(mysqli_error());
	$row=mysqli_fetch_array($query);
           $id=$row['admin_id'];
           $first=$row['admin_first'];
           $last=$row['admin_last'];
           $counter=mysqli_num_rows($query);
		  	if ($counter == 0) 
			  {	
			 	 echo "<script type='text/javascript'>alert('Invalid Email or Password!');
			 	 document.location='index.php'</script>";
			  } 
			  elseif ($counter > 0)
			  {
			  	$_SESSION['admin_id']=$id;	
				$_SESSION['admin_pic']='default.gif';
				$_SESSION['admin_name']=$first." ".$last;
			  
				$id=$_SESSION['id'];
				  $date=date("Y-m-d H:i");
				          mysqli_query($con,"INSERT INTO history_logs(log,log_date,member_id) VALUES('successfully logged in!','$date','$id')")or die(mysqli_error($con)); 
				  echo "<script type='text/javascript'>document.location='home.php'</script>";
			  	}
				  
?>
	
