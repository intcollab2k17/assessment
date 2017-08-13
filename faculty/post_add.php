<?php include('session.php');
	error_reporting(0);
	$id=$_SESSION['id'];
	$title = $_POST['title'];
	$group = $_POST['group'];
	$desc = $_POST['desc'];
	$assign = $_POST['assign'];
	$date = date('Y-m-d',strtotime($_POST['date']));
	$time=date('H:i:s',strtotime($_POST['time']));
	$points = $_POST['points'];
	$due=$date." ".$time;
	date_default_timezone_set("Asia/Manila");
	$date_posted=date('Y-m-d H:i:s');
	//$date1=date('M d, Y h:i a');
	$notif="$title on";
	$name = $_FILES["image"]["name"];

	if ($name<>"")
	{

		$type = $_FILES["image"] ["type"];
		$size = $_FILES["image"] ["size"];
		$temp = $_FILES["image"] ["tmp_name"];
		$error = $_FILES["image"] ["error"];
													
		if ($error > 0){
			die("Error uploading file! Code $error.");
			}
		else{
			if($size > 100000000000) //conditions for the file
				{
					die("Format is not allowed or file size is too big!");
				}
				else
				{
					move_uploaded_file($temp, "../uploads/".$name);
				}
			}
	}
	else
	{
		$name="";
	}

	if($assign<>"")
	{
		$stat="assignment";
	}
	else
	{
		$stat="post";	
	}

	mysqli_query($con,"INSERT INTO post(post_title,post_content,points,post_date,member_id,post_type,post_file) VALUES('$title','$desc','$points','$date_posted','$id','$stat','$name')")or die(mysqli_error($con));
	    	
	    	$pid=mysqli_insert_id($con);
	    	foreach($group as $chk1) {	
				    mysqli_query($con,"INSERT INTO group_post(post_id,group_id,due_date) VALUES('$pid','$chk1','$due')")or die(mysqli_error($con));

						$link="view_group.php?gid=$chk1";	   
				    	mysqli_query($con,"INSERT INTO notif(notif,group_id,link,status) VALUES('$notif','$chk1','$link','student')")or die(mysqli_error($con));

				    	$id=mysqli_insert_id($con);
				    	$query=mysqli_query($con,"select * from enrol where group_id='$chk1'")or die(mysqli_error($con));
				    		while ($row=mysqli_fetch_array($query)) {
				    			$mid=$row['member_id'];

				    			mysqli_query($con,"INSERT INTO notif_stat(notif_id,member_id,read_status) VALUES('$id','$mid','0')")or die(mysqli_error($con));	
				    		}
					} 
	
			echo "<script>document.location='home.php'</script>";  					
	
?>
