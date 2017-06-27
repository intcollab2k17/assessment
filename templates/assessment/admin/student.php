<?php 
include('session.php');
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Student</title>
<?php include('head.php');?>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
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
								<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Student
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<button id="sample_editable_1_new" class="btn green">
											Import <i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
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
	include('dbcon.php');
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
													<span class="caption-subject bold uppercase"> Add Student</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="student_save.php">
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
<script src="../../../assets/global/plugins/respond.min.js"></script>
<script src="../../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../../assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="../../../assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="../../../assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="../../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../../../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="../../../assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="../../../assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../../../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="../../../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="../../../assets/admin/pages/scripts/components-pickers.js"></script>
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