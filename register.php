<?php 
 
	  $first=$_POST['first'];
	  $last=$_POST['last'];
	  $idno=$_POST['idno'];
	  $email =$_POST['email'];
	  $password =md5($_POST['password']);
	  $type =$_POST['type'];
	  $date=date("Y-m-d");
		
		include('includes/dbcon.php');
	    
	   //  $query1=mysqli_query($con,"SELECT id_no from member where id_no='$idno'")or die(mysqli_error($con));
	   //  	$count = mysqli_num_rows($query1);
	   //  	if ($count>0)
	   //  	{
	   //  		echo "<script type='text/javascript'>alert('Sorry! ID Number already registered!');</script>";
				// echo "<script>document.location='index.php';window.history.back();</script>";
	   //  	}
	   //  	else
	   //  	{
	    		$query=mysqli_query($con,"SELECT * from member where id_no='$idno' and member_first='$first' and member_last='$last' and member_type='$type'")or die(mysqli_error($con));

					$num_rows = mysqli_num_rows($query);

						while($row=mysqli_fetch_array($query)){
					  	$id=$row['member_id'];}

				if ($num_rows<1)			
						{
							
						echo "<script type='text/javascript'>alert('Sorry! You provided an invalid data!');</script>";
						echo "<script>document.location='index.php';window.history.back();</script>";

						}
				else
						{
							if ($row['reg_status']==0)
							{
							 mysqli_query($con,"UPDATE member SET id_no='$idno',email='$email',reg_status='1',date_registered='$date',password='$password' where member_id='$id'")or die(mysqli_error($con)); 

								echo "<script type='text/javascript'>alert('Successfully registered! You may now login!');</script>";

								$date=date("Y-m-d H:i");
			  	mysqli_query($con,"INSERT INTO history_logs(log,log_date,member_id) VALUES('successfully registered!','$date','$id')")or die(mysqli_error($con));  

							}
		 					else
		 					{
		 						echo "<script type='text/javascript'>alert('Sorry! You are already registered!');</script>";

		 					}
									echo "<script>document.location='index.php'</script>";
						}
	    	//}

?>

