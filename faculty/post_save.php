<?php include('session.php');

	$id=$_SESSION['id'];
	$title = $_POST['title'];
	$group = $_POST['group'];
	$desc = $_POST['desc'];
	$date = $_POST['date']." ".$_POST['time'];;
	$points = $_POST['points'];
	
	date_default_timezone_set("Asia/Manila");
	$date_posted=date('Y-m-d h:i a');
	$link="view_group.php?gid=$group";
	$notif="New post $title $date_posted on";
	mysqli_query($con,"INSERT INTO post(post_title,post_content,points,post_date) VALUES('$title','$desc','$points','$date_posted')")or die(mysqli_error($con));
	    $pid=mysqli_insert_id($con);
	    
	foreach($group as $chk1) {	
				    mysqli_query($con,"INSERT INTO group_post(post_id,group_id,due_date) VALUES('$pid','$chk1','$date')")or die(mysqli_error($con));
				    
				    mysqli_query($con,"INSERT INTO t_log(t_id,activity_type,activity,activity_id,class_id,log_date,stud_id) VALUES('$tid','assignment','posted new assignment','$id','$chk1','$date','0')")or die(mysqli_error($con));

					mysqli_query($con,"INSERT INTO notif(notif,group_id,link,status) VALUES('$notif','$chk1','','$link','student')")or die(mysqli_error($con));				    
					}
			        
	    $max_file_size = 100000*100; //10mb
	    $path = "../dist/uploads/"; // Upload directory
	    $count = 0;

	    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		    // Loop $_FILES to exeicute all files
		    foreach ($_FILES['files']['name'] as $f => $name) {     
			if ($_FILES['files']['error'][$f] == 4) {
			    continue; // Skip file if any error found
			}	       
			if ($_FILES['files']['error'][$f] == 0) {	           
			    if ($_FILES['files']['size'][$f] > $max_file_size) {
				$message[] = "$name is too large!.";
				continue; // Skip large files
			    }
			    else{ // No error found! Move uploaded files 
				if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
				$count++; // Number of successfully uploaded file
				
				//mysqli_query($con,"INSERT INTO t_upload(assign_id,file) VALUES('$id','$name')")or die(mysqli_error());
			
				 
	
			    }
					 // echo "<script type='text/javascript'>alert('Successfully added new post!');</script>";
					 // echo "<script>document.location='home.php'</script>";  
			}
		    }
	    }

	
	
?>
