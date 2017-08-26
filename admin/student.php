<?php 
include('session.php');
?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Student</title>
<?php include('head.php');?>

</head>

<body class="page-md page-header-fixed page-sidebar-closed page-sidebar-closed-hide-logo">
<?php include('header.php');?>

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php include('sidebar.php');?>
	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<?php //include('profile_sidebar.php');?>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-8">
								<!-- BEGIN PORTLET -->
								<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Student
							</div>
						</div>
						<div class="portlet-body">
							
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									 ID NO
								</th>
								<th>
									 Last Name
								</th>
								<th>
									 First Name
								</th>
								<th>
									 Email
								</th>
								<th>
									 Course
								</th>
								<th>
									 Edit
								</th>
								<th>
									 Delete
								</th>
							</tr>
							</thead>
							<tbody>
<?php
	include('../includes/dbcon.php');
	$query1=mysqli_query($con,"select * from member where member_type='student' order by member_last")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "
			<div class='alert alert-danger'>
				You have members yet!
			</div>";
			while($row2=mysqli_fetch_array($query1))
			{
			
?>								
							<tr>
								<td>
									 <?php echo $row2['id_no'];?>
								</td>
								<td>
									 <?php echo $row2['member_last'];?>
								</td>
								<td>
									 <?php echo $row2['member_first'];?>
								</td>
								<td class="center">
									 <?php echo $row2['email'];?>
								</td>
								<td>
									 <?php echo $row2['cys'];?>
								</td>
								<td>
									<a class="btn default" data-toggle="modal" href="#edit<?php echo $row2['member_id'];?>">
									<i class="icon-note font-blue"></i> </a>
								</td>
								<td>
									<a class="btn default" data-toggle="modal" href="#delete<?php echo $row2['member_id'];?>">
									<i class="icon-trash font-red"></i> </a>
								</td>
							</tr>
							<!-- /.edit -->
							<div class="modal fade bs-modal-sm" id="edit<?php echo $row2['member_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Student Details</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="student_update.php">
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="idno" value="<?php echo $row2['id_no'];?>" required>
														<span class="help-block">ID Number</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $row2['member_id'];?>" required>
														<input type="text" class="form-control" id="form_control_1" name="last" value="<?php echo $row2['member_last'];?>" required>
														<span class="help-block">Student Last Name</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="first" value="<?php echo $row2['member_first'];?>" required>
														<span class="help-block">Student First Name</span>
													</div>
													
													<div class="form-group form-md-line-input form-md-floating-label" id="points">
														<input type="email" class="form-control" id="form_control_1" name="email" value="<?php echo $row2['email'];?>" required>
														<span class="help-block">Email Address</span>
													</div>
													<div class="form-group form-md-line-input has-info">
														<select class="form-control" id="form_control_1" name="cys">
															<option><?php echo $row2['cys'];?></option>
<?php
	
	$query=mysqli_query($con,"select * from cys order by cys")or die(mysqli_error());
		
			while($row=mysqli_fetch_array($query))
			{
				
?>																
															
															<option><?php echo $row['cys'];?></option>
<?php }?>															
														</select>
														<label for="form_control_1">Course, Yr. & Section</label>
													</div>
												
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Save changes</button>
										</div>
									</div></form>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->	
							<!-- /.delete -->
							<div class="modal fade bs-modal-sm" id="delete<?php echo $row2['member_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Delete Student</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="student_del.php">
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $row2['member_id'];?>" required>
														Are you sure you want to delete <?php echo $row2['member_first']." ".$row2['member_last'];?>?
													</div>
													
													
												
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Delete</button>
										</div>
									</div></form>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->							
<?php }?>							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
								<!-- END PORTLET -->
							</div>
							<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											<div class="portlet-title">
												<div class="caption font-red-sunglo">
													<i class=" icon-notebook font-red-sunglo"></i>
													<span class="caption-subject bold uppercase"> Import Student</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form method="post" enctype="multipart/form-data">
											<p style="font-size:16px;line-height:34px;">Follow format to upload successfully. Columns ID Number, Last Name, First Name, Course Yr. & Section and should be in <b>CSV</b> format</p>
											<input type="file" name="image">
											<input type="submit" name="import" value="Import" class="btn btn-primary">
										    </form>									
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
									
								</div>
								<div class="col-md-12">
									<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											<div class="portlet-title">
												<div class="caption font-red-sunglo">
													<i class=" icon-notebook font-red-sunglo"></i>
													<span class="caption-subject bold uppercase"> Add Student</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="student_save.php">
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="idno" required>
														<label for="form_control_1">ID Number</label>
														<span class="help-block">ID Number</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="last" required>
														<label for="form_control_1">Last Name</label>
														<span class="help-block">Student Last Name</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="first" required>
														<label for="form_control_1">First Name</label>
														<span class="help-block">Student First Name</span>
													</div>
													
													<div class="form-group form-md-line-input form-md-floating-label" id="points">
														<input type="email" class="form-control" id="form_control_1" name="email" required>
														<label for="form_control_1">Email</label>
														<span class="help-block">Email Address</span>
													</div>
													<div class="form-group form-md-line-input has-info">
														<select class="form-control" id="form_control_1" name="cys">
															<option value=""></option>
<?php
	
	$query=mysqli_query($con,"select * from cys order by cys")or die(mysqli_error());
		
			while($row=mysqli_fetch_array($query))
			{
				
?>																
															
															<option><?php echo $row['cys'];?></option>
<?php }?>															
														</select>
														<label for="form_control_1">Course, Yr. & Section</label>
													</div>
													<div class="form-actions noborder">
														<button type="submit" class="btn blue">Save</button>
														<button type="reset" class="btn default">Cancel</button>
													</div>
												</form>
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
									
								</div>
									
								</div><!--end row-->	
							</div>
						</div>
						
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2014 &copy; Metronic by keenthemes.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<?php include('script.php');?>
<script>

jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features\
Profile.init(); // init page demo
});
</script>
<script>
	jQuery(document).ready(function() {       
        // initiate layout and plugins
    	Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
        ComponentsPickers.init();
    });   
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 	
<?php
if (isset($_POST['import'])) 
{
	if (is_uploaded_file($_FILES['image']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['image']['name'] ." uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
		readfile($_FILES['image']['tmp_name']);
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['image']['tmp_name'], "r");

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		mysqli_query($con,"INSERT into member(member_last,member_first,member_type,cys,id_no) values('$data[0]','$data[1]','Student','$data[2]','$data[3]')");
		
		}

	fclose($handle);

	//print "Import done";
	echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
	echo "<script>document.location='student.php'</script>";
	//view upload form
}

?>