<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Quiz </title>
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
					<?php include('profile_sidebar.php');?>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-8">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Quiz</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_posts" data-toggle="tab">
												Active Quizzes </a>
											</li>
											<li>
												<a href="#tab_quizzes" data-toggle="tab">
												Inactive </a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
										<div class="tab-content">
											<div class="tab-pane active" id="tab_posts">
												<!-- BEGIN PORTLET -->
												<div class="portlet box blue">
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-edit"></i>Quizzes
													</div>
												</div>
												<div class="portlet-body">
													
													<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
													<thead>
													<tr>
														<th>
															 Title
														</th>
														<th>
															 Group
														</th>
														<th>
															 Duration
														</th>
														<th>
															 Date
														</th>
														<th>
															 Time
														</th>
														<th>
															 Edit
														</th>
														<th>
															 View
														</th>
													</tr>
													</thead>
													<tbody>
						<?php
							include('../includes/dbcon.php');
							$id=$_SESSION['id'];
							$query=mysqli_query($con,"select * from quiz natural join group_quiz where member_id='$id' and group_quiz_stat='active'")or die(mysqli_error());
								
								$countassign=mysqli_num_rows($query);
								if ($countassign<1) echo "
									<div class='alert alert-danger'>
										You have quizzes yet!
									</div>";
									while($row=mysqli_fetch_array($query))
									{
									$gqid=$row['group_quiz_id'];	
									$group_id=$row['group_id'];
									$qid=$row['quiz_id'];

									$queryq=mysqli_query($con,"select * from `group` natural join subject where group_id='$group_id'")or die(mysqli_error());
								
								
										$rowq=mysqli_fetch_array($queryq);
						?>								
													<tr>
														<td>
															 <?php echo $row['quiz_title'];?>
														</td>
														<td>
															 <?php echo $rowq['subject_code']." ".$rowq['cys'];?>
														</td>
														<td class="center">
															 <?php echo $row['quiz_duration'];?> mins
														</td>
														<td class="center">
															 <?php echo date("M d, Y",strtotime($row['quiz_date']));?> 
														</td>
														<td class="center">
															 <?php echo date("h:i A",strtotime($row['quiz_time']));?> 
														</td>
														<td>
															<a class="btn default" data-toggle="modal" href="#edit<?php echo $qid;?>">
															<i class="icon-note font-blue"></i> </a>
														</td>
														<td>
															<a class="btn" href="create_quiz.php?qid=<?php echo $qid;?>">
															<i class="icon-eye font-green"></i> </a>
															<a class="btn" href="monitor.php?gqid=<?php echo $gqid;?>&gid=<?php echo $group_id;?>">
															<i class="fa fa-desktop font-orange"></i> </a>
														</td>
													</tr>
													<!-- /.edit -->
													<div class="modal fade bs-modal-sm" id="edit<?php echo $qid;?>" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-sm">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																	<h4 class="modal-title">Update Quiz Details</h4>
																</div>
																<div class="modal-body">
																	<!-- BEGIN SAMPLE FORM PORTLET-->
																<div class="portlet light">
																	
																	<div class="portlet-body form">
																		<form role="form" method="post" action="quiz_update.php" enctype='multipart/form-data'>
													<div class="form-group form-md-line-input form-md-floating-label">
													<input type="hidden" class="form-control" id="form_control_1" name="qid" value="<?php echo $qid;?>" required>
													<input type="hidden" class="form-control" id="form_control_1" name="gid" value="<?php echo $group_id;?>">
														<input type="text" class="form-control" id="form_control_1" name="title" value="<?php echo $row['quiz_title'];?>" required>
														<span class="help-block">Title of Quiz</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="desc" value="<?php echo $row['quiz_instruction'];?>" required>
														<span class="help-block">Instruction of Quiz</span>
													</div>
													
													<div class="form-group form-md-line-input form-md-floating-label" id="points">
														<input type="number" class="form-control" id="form_control_1" name="duration" value="<?php echo $row['quiz_duration'];?>" >
														<span class="help-block">Duration of Quiz in minutes</span>
													</div>
													<div class="form-body">
														<div class="form-group form-md-line-input form-md-floating-label" id="date">
															<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php echo date("m/d/Y",strtotime($row['quiz_date']));?>"  name="date">
															
													<span class="help-block">Date of Quiz</span>
														</div>
														<div class="form-group form-md-line-input form-md-floating-label" id="time">
																	<input type="text" class="form-control timepicker timepicker-no-seconds" name="time" value="<?php echo $row['quiz_time'];?>" >
																	<span class="input-group-btn">
																	Time of Quiz
																	</span>
															
														</div>
														<div class="form-group form-md-line-input form-md-floating-label has-info">
															<select class="form-control" id="form_control_1" name="status">
																<option value="active">Active</option>
																<option value="inactive">Inactive</option>
															</select>
															
														</div>
													</div>
													
																			
																		
																	</div>
																</div>
																<!-- END SAMPLE FORM PORTLET-->
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn default" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn blue" name="update">Save changes</button>
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
																	<h4 class="modal-title">Delete Faculty</h4>
																</div>
																<div class="modal-body">
																	<!-- BEGIN SAMPLE FORM PORTLET-->
																<div class="portlet light">
																	
																	<div class="portlet-body form">
																		<form role="form" method="post" action="faculty_del.php">
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
											<div class="tab-pane" id="tab_quizzes">
												<!-- BEGIN PORTLET -->
												<div class="portlet box blue">
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-edit"></i>Quizzes
													</div>
												</div>
												<div class="portlet-body">
													
													<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
													<thead>
													<tr>
														<th>
															 Title
														</th>
														<th>
															 Group
														</th>
														<th>
															 Duration
														</th>
														<th>
															 Date
														</th>
														<th>
															 Time
														</th>
														<th>
															 Edit
														</th>
														<th>
															 View
														</th>
													</tr>
													</thead>
													<tbody>
						<?php
							include('../includes/dbcon.php');
							$id=$_SESSION['id'];
							$query=mysqli_query($con,"select * from quiz natural join group_quiz where member_id='$id' and group_quiz_stat='inactive'")or die(mysqli_error());
								
								$countassign=mysqli_num_rows($query);
								if ($countassign<1) echo "
									<div class='alert alert-danger'>
										You have quizzes yet!
									</div>";
									while($row=mysqli_fetch_array($query))
									{
									$group_id=$row['group_id'];
									$qid=$row['quiz_id'];


									$queryq=mysqli_query($con,"select * from `group` natural join subject where group_id='$group_id'")or die(mysqli_error());
								
								
										$rowq=mysqli_fetch_array($queryq);
						?>								
													<tr>
														<td>
															 <?php echo $row['quiz_title'];?>
														</td>
														<td>
															 <?php echo $rowq['subject_code']." ".$rowq['cys'];?>
														</td>
														<td class="center">
															 <?php echo $row['quiz_duration'];?> mins
														</td>
														<td class="center">
															 <?php echo date("M d, Y",strtotime($row['quiz_date']));?> 
														</td>
														<td class="center">
															 <?php echo date("h:i a",strtotime($row['quiz_time']));?> 
														</td>
														<td>
															<a class="btn default" data-toggle="modal" href="#edit<?php echo $qid;?>">
															<i class="icon-note font-blue"></i> </a>
														</td>
														<td>
															<a class="btn default" data-toggle="modal" href="create_quiz.php?qid=<?php echo $qid;?>">
															<i class="icon-eye font-green"></i> </a>
														</td>
													</tr>
													<!-- /.edit -->
													<div class="modal fade bs-modal-sm" id="edit<?php echo $qid;?>" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-sm">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																	<h4 class="modal-title">Update Quiz Details</h4>
																</div>
																<div class="modal-body">
																	<!-- BEGIN SAMPLE FORM PORTLET-->
																<div class="portlet light">
																	
																	<div class="portlet-body form">
																		<form role="form" method="post" action="quiz_update.php" enctype='multipart/form-data'>
													<div class="form-group form-md-line-input form-md-floating-label">
													<input type="hidden" class="form-control" id="form_control_1" name="qid" value="<?php echo $qid;?>" required>
													<input type="hidden" class="form-control" id="form_control_1" name="gid" value="<?php echo $group_id;?>">
														<input type="text" class="form-control" id="form_control_1" name="title" value="<?php echo $row['quiz_title'];?>" required>
														<span class="help-block">Title of Quiz</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="desc" value="<?php echo $row['quiz_instruction'];?>" required>
														<span class="help-block">Instruction of Quiz</span>
													</div>
													
													
													<div class="form-group form-md-line-input form-md-floating-label" id="points">
														<input type="number" class="form-control" id="form_control_1" name="duration" value="<?php echo $row['quiz_duration'];?>" >
														<span class="help-block">Duration of Quiz in minutes</span>
													</div>
													<div class="form-body">
														<div class="form-group form-md-line-input form-md-floating-label" id="date">
															<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php echo date("m-d-Y",strtotime($row['quiz_date']));?>"  name="date">
															
													<span class="help-block">Date of Quiz</span>
														</div>
														<div class="form-group form-md-line-input form-md-floating-label" id="time">
																	<input type="text" class="form-control timepicker timepicker-no-seconds" name="time" value="<?php echo $row['quiz_time'];?>" >
																	<span class="input-group-btn">
																	Time of Quiz
																	</span>
															
														</div>
														<div class="form-group form-md-line-input form-md-floating-label has-info">
															<select class="form-control" id="form_control_1" name="status">
																
																<option value="inactive">Inactive</option>
																<option value="active">Activate</option>
															</select>
															
														</div>
													</div>
													
																			
																		
																	</div>
																</div>
																<!-- END SAMPLE FORM PORTLET-->
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn default" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn blue" name="update">Save changes</button>
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
																	<h4 class="modal-title">Delete Faculty</h4>
																</div>
																<div class="modal-body">
																	<!-- BEGIN SAMPLE FORM PORTLET-->
																<div class="portlet light">
																	
																	<div class="portlet-body form">
																		<form role="form" method="post" action="faculty_del.php">
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
										</div>
										<!--END TABS-->
									</div>
								</div>
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
													<span class="caption-subject bold uppercase"> Add Quiz</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="quiz_add.php"'>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="title" required>
														<label for="form_control_1">Quiz Title</label>
														<span class="help-block">Title of Quiz</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="desc" required>
														<label for="form_control_1">Quiz Instruction</label>
														<span class="help-block">Instruction of Quiz</span>
													</div>
													
													
													<div class="form-group form-md-line-input form-md-floating-label" id="points">
														<input type="number" class="form-control" id="form_control_1" name="duration">
														<label for="form_control_1">Duration</label>
														<span class="help-block">Duration of Quiz in minutes</span>
													</div>
													<div class="form-body">
														<div class="form-group form-md-line-input form-md-floating-label" id="date">
															<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" name="date">
													
													<span class="help-block">Date of Quiz</span>
														</div>
														<div class="form-group form-md-line-input form-md-floating-label" id="time">
																	<input type="text" class="form-control timepicker timepicker-no-seconds" name="time">
																	<span class="input-group-btn">
																	Time of Quiz
																	</span>
															
														</div>
														<div class="form-group form-md-checkboxes">
															<label>Groups</label>

															<div class="md-checkbox-inline">
<?php
			
		$query=mysqli_query($con,"select * from `group` natural join subject where member_id='$id'")or die(mysqli_error());
  			while ($row=mysqli_fetch_array($query)){
?>																
																<div class="md-checkbox">
																	<input type="checkbox" id="<?php echo $row['group_id'];?>" class="md-check" value="<?php echo $row['group_id'];?>" name="group[]">
																	<label for="<?php echo $row['group_id'];?>">
																	<span class="inc"></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	<?php echo $row['subject_code']." ".$row['cys'];?> </label>
																</div>
<?php }?>																													
															</div>
														</div>
													</div>
													<div class="form-actions noborder">
														<button type="submit" name="save" class="btn blue">Save</button>
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
<?php include('footer.php');?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
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