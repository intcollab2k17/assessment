<?php session_start();

include('includes/dbcon.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['email'];
$pass_unsafe=$_POST['password'];
$type=$_POST['type'];

$email = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,$pass_unsafe);
$pass1=md5($pass);

$query=mysqli_query($con,"select * from member where email='$email' and password='$pass1' and member_type='$type'")or die(mysqli_error());
	$row=mysqli_fetch_array($query);
           $id=$row['member_id'];
           $first=$row['member_first'];
           $last=$row['member_last'];
           $pic=$row['member_pic'];
           $counter=mysqli_num_rows($query);
		  	if ($counter == 0) 
			  {	
			 	 echo "<script type='text/javascript'>alert('Invalid Email or Password!');
			 	 document.location='index.php';window.history.back();</script>";
			  } 
			  elseif ($counter > 0)
			  {
			  	$_SESSION['id']=$id;	
				$_SESSION['pic']=$pic;
				$_SESSION['type']=$type;
				$_SESSION['name']=$first." ".$last;
				  

			  	if ($type == 'Faculty') 
			  	{
			  		echo "<script type='text/javascript'>document.location='faculty/home.php'</script>";
			  	}
			  	else
			  	{
			  		echo "<script type='text/javascript'>document.location='student/home.php'</script>";
			  	}
				  
  
	  }
}

?>
	
