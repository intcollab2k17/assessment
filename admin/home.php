<?php 
include('session.php');
?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Pages - New User Profile</title>
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
							<div class="col-md-12">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Dashboard</span>
										</div>
									</div>
									<div class="portlet-body">
										<div class="tiles">
												<a href="faculty.php">
													<div class="tile bg-blue">
														<div class="tile-body">
															<i class="icon-users"></i>
														</div>
														<div class="tile-object">
															<div class="name">
																 Faculty
															</div>
															<div class="number">
															
															</div>
														</div>
													</div>
												</a>
												<a href="student.php">
													<div class="tile bg-blue">
														<div class="tile-body">
															<i class="icon-user-female"></i>
														</div>
														<div class="tile-object">
															<div class="name">
																 Student
															</div>
															<div class="number">
																 
															</div>
														</div>
													</div>
												</a>
												<a href="cys.php">
													<div class="tile bg-blue selected">
														<div class="corner">
														</div>
														<div class="check">
														</div>
														<div class="tile-body">
															<i class="icon-notebook"></i>
														</div>
														<div class="tile-object">
															<div class="name">
																 Course,Yr. & Section
															</div>
														</div>
													</div>
												</a>
												<a href="subject.php">
													<div class="tile bg-blue">
														<div class="tile-body">
															<i class="icon-book-open"></i>
														</div>
														<div class="tile-object">
															<div class="name">
																 Subject
															</div>
															<div class="number">
																 
															</div>
														</div>
													</div>
												</a>
												<a href="admin.php">
													<div class="tile bg-blue">
														<div class="tile-body">
															<i class="icon-ghost"></i>
														</div>
														<div class="tile-object">
															<div class="name">
																 Admin User
															</div>
															<div class="number">
																 
															</div>
														</div>
													</div>
												</a>
												<a href="logs.php">
													<div class="tile bg-blue">
														<div class="tile-body">
															<i class="icon-ghost"></i>
														</div>
														<div class="tile-object">
															<div class="name">
																 User Logs
															</div>
															<div class="number">
																 
															</div>
														</div>
													</div>
												</a>
												</div>
									</div>
								</div>
								<!-- END PORTLET -->
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
<?php include('script.php');?>
<script>
$("#assign").click(function(){
        $("#points").toggle('slow');
        $("#date").toggle('slow');
        $("#time").toggle('slow');
      });

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
        $("#points").hide('slow');
        $("#date").hide('slow');
        $("#time").hide('slow');
    });   
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 	