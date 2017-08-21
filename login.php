<?php session_start();

include('includes/dbcon.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['idno'];
$pass_unsafe=$_POST['password'];
$type=$_POST['type'];


$idno = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,$pass_unsafe);
$pass1=md5($pass);

$query=mysqli_query($con,"select * from member where id_no='$idno' and password='$pass1' and member_type='$type'")or die(mysqli_error());
	$row=mysqli_fetch_array($query);
           $id=$row['member_id'];
           $first=$row['member_first'];
           $last=$row['member_last'];
           $pic=$row['member_pic'];
           $counter=mysqli_num_rows($query);
		  	if ($counter == 0) 
			  {	
			 	 echo "<script type='text/javascript'>alert('Invalid ID Number or Password!');
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

			  	$date=date("Y-m-d H:i");
			  	mysqli_query($con,"INSERT INTO history_logs(log,log_date,member_id) VALUES('successfully logged in!','$date','$id')")or die(mysqli_error($con));  
	
				  
  
	  }
}

?>
	
