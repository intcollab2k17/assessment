<?php include('session.php');
error_reporting(0);
?>
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
							<div class="col-md-12">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Groups</span>
										</div>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
										<div class="tiles">
<?php
	
	$id=$_SESSION['id'];
	
		$query1=mysqli_query($con,"select * from `group` natural join subject where group_stat ='Active' order by subject_code")or die(mysqli_error($con));
				 $countassign=mysqli_num_rows($query1);
				  if ($countassign<1) echo "<h4 class='text-red'>You have not created any class yet!</h4>";
						while($row2=mysqli_fetch_array($query1))
						{
							$group_id=$row2['group_id'];

?>								

											<a class="" data-toggle="modal" href="#delete<?php echo $row2['group_id'];?>">
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
$querycount=mysqli_query($con,"select * from enrol where group_id='$group_id' and status='approved'")or die(mysqli_error($con));
	$count=mysqli_num_rows($querycount);
	echo "Members(".$count.")";
?>															
																 
															</div>
														</div>
													</div>
												</a>
													
													<!-- /.delete -->
							<div class="modal fade bs-modal-sm" id="delete<?php echo $group_id;?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Enrol</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
											<div class="portlet light">
												
												<div class="portlet-body form">
													<form role="form" method="post" action="enrol.php">
														<div class="form-group form-md-line-input form-md-floating-label">
															<input type="hidden" class="form-control" id="form_control_1" name="gid" value="<?php echo $row2['group_id'];?>" required>
															Are you sure you want to enrol in this class?
														</div>
														
														
													
												</div>
											</div>
											<!-- END SAMPLE FORM PORTLET-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Enrol</button>
										</div>
											</form>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
<?php }?>													
												
										<!--END TABS-->
									</div>
									</div>
								</div>
								<!-- END PORTLET -->
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
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<?php include('script.php');?>
<!-- END PAGE LEVEL SCRIPTS -->
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