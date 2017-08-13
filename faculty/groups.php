<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Pages - New User Profile</title>
<?php include('head.php');?>
<style type="text/css">
	.name{
		font-size: 18px!IMPORTANT;
	}

</style>
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
											<span class="caption-subject font-blue-madison bold uppercase">Active Groups</span>
										</div>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
										<div class="tiles">
<?php

	$id=$_SESSION['id'];
	
		$query1=mysqli_query($con,"select * from `group` natural join subject where member_id='$id' and group_stat='Active' order by subject_code")or die(mysqli_error($con));
				 $countassign=mysqli_num_rows($query1);
				  if ($countassign<1) echo "<h4 class='text-red'>You have not created any class yet!</h4>";
						while($row2=mysqli_fetch_array($query1))
						{
							$group_id=$row2['group_id'];

?>											<a href="view_group.php?gid=<?php echo $group_id;?>">
													<div class="tile image double selected">
														<div class="tile-body">
															<img src="../assets/admin/pages/media/gallery/image4.jpg" alt="">
														</div>
														<div class="tile-object">
															<div class="name">
															
																 <?php echo $row2['subject_code']." ".$row2['cys'];?>
															</div>
															<div class="number">
<?php 
$querycount=mysqli_query($con,"select * from enrol where group_id='$group_id'")or die(mysqli_error($con));
	$count=mysqli_num_rows($querycount);
	echo "Members(".$count.")";
?>															
																 
															</div>
														</div>
													</div>
<?php }?>													
												</div>
												</a>
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
													<i class="icon-users font-red-sunglo"></i>
													<span class="caption-subject bold uppercase"> Add Group</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="group_add.php">
													<div class="form-body">
														<div class="form-group form-md-line-input has-info">
															<select class="form-control" id="form_control_1" name="cys">
<?php
			
		$query=mysqli_query($con,"select * from cys order by cys")or die(mysqli_error());
  			while ($row=mysqli_fetch_array($query)){
?>															
			<option><?php echo $row['cys'];?></option>
<?php }?>																
															</select>
															<label for="form_control_1">Course, Yr. & Section</label>
														</div>
														<div class="form-group form-md-line-input has-info">
															<select class="form-control" id="form_control_1" name="subject">
<?php
			
		$query=mysqli_query($con,"select * from subject order by subject_code")or die(mysqli_error());
  			while ($row=mysqli_fetch_array($query)){
?>															
			<option value="<?php echo $row['subject_id'];?>"><?php echo $row['subject_code'];?></option>
<?php }?>
															</select>
															<label for="form_control_1">Subject</label>
														</div>
														<div class="form-body">
														<div class="form-group form-md-line-input has-info">
															<select class="form-control" id="form_control_1" name="sem">		
																<option>1st</option>							
																<option>2nd</option>							
																<option>Summer</option>													
															</select>
															<label for="form_control_1">School Year</label>
														</div>
													</div>
													<div class="form-body">
														<div class="form-group form-md-line-input has-info">
															<input type="text" class="form-control" id="form_control_1" name="sy" required>
															<label for="form_control_1">School Year</label>
														</div>
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
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>