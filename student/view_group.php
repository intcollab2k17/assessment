<?php include('session.php');?>
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
					<?php include('profile_sidebar.php');?>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
<?php 

$gid=$_REQUEST['gid'];
$query=mysqli_query($con,"select * from `group` natural join subject where group_id='$gid'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);
?>					
					<div class="profile-content">
						<div class="row">
							<div class="col-md-8">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase"><?php echo $row['subject_code']." ".$row['cys'];?></span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#group_posts" data-toggle="tab">
												Posts </a>
											</li>
											<li>
												<a href="#group_progress" data-toggle="tab">
												Progress </a>
											</li>
											<li>
												<a href="#group_members" data-toggle="tab">
												Members </a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
										<div class="tab-content">
											<div class="tab-pane active" id="group_posts">
												<div class="scroller" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<div class="general-item-list">
<?php
	
	$id=$_SESSION['id'];
	
	$query1=mysqli_query($con,"select * from post natural join group_post natural join `group` where group_id='$gid' order by post_date desc")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "<h4 class='text-red'>You have not created any post yet!</h4>";
			while($row2=mysqli_fetch_array($query1))
			{
			$pid=$row2['post_id'];	
			$cys=$row2['cys'];	
			$gid=$row2['group_id'];	
			$gpid=$row2['group_post_id'];
			$file="uploads/$row2[post_file]";
			$ext = pathinfo($file, PATHINFO_EXTENSION);	
			include("ext.php");		

			$member_id=$row2['member_id'];	
			$gpid=$row2['group_post_id'];	

			$query=mysqli_query($con,"select * from member where member_id='$member_id'")or die(mysqli_error());
		
				$row=mysqli_fetch_array($query);
?>											
														<div class="item">
															<div class="item-head">
																<div class="item-details">
																	<img class="item-pic" src="../images/<?php echo $row['member_pic'];?>">
																	<a href="#" class="item-name primary-link"><?php echo $_SESSION['name'];?>
																	</a>
																	<span class="item-label"><?php echo date('M d, Y h:i A',strtotime($row2['post_date']));?></span>
																</div>
																<span class="item-status"><span class="badge badge-empty badge-success"></span> Open</span>
															</div>
															
															<div class="item-body">
																 <h3><?php echo $row2['post_title'];?>
																 <i class="icon-action-redo font-blue"></i> <?php echo $cys;?></h3>
																 <p><?php echo $row2['post_content'];?></p>
<?php
	
	$query2=mysqli_query($con,"select * from post where post_id='$pid'")or die(mysqli_error());
		$row1=mysqli_fetch_array($query2);
				$file="../uploads/$row1[post_file]";
				$ext = pathinfo($file, PATHINFO_EXTENSION);	
				include("ext.php");	
			
			if($row1['post_type']=='assignment')
			{
				include('attachment.php');
			}

			if($row1['post_file']<>'')
			{
				include('file.php');
			}
?> 
<?php 
if($row1['post_type']=='assignment')
			{
				include('turnin.php');
			}
?>
																 </form>
																
															
															</div>
														</div>
		<?php }?>		
													</div>
												</div>
											</div>
											<div class="tab-pane" id="group_progress">
												<?php include('group_progress.php');?>
											</div>
											<div class="tab-pane" id="group_members">
												<?php include('group_members.php');?>
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
										<div class="portlet box blue">
											<div class="portlet-title">
												<div class="caption">
													<i class="icon-users"></i>Members
												</div>
											</div>
											<div class="portlet-body">
												<div class="row">
<?php
    $query=mysqli_query($con,"select * from enrol natural join member where group_id='$gid' and member_type='student' and status='approved'")or die(mysqli_error());
			while($row=mysqli_fetch_array($query))
			{
			
?> 												
													<div class="col-sm-12 col-md-6">
														<div class="thumbnail">
															<img src="../images/<?php echo $row['member_pic'];?>" alt="100%x200" style="width: 100px;height:100px;display: block;" data-src="holder.js/100%x200">
															<div class="caption">
																<h5><?php echo $row['member_first']." ".$row['member_last'];?> </h5>
															</div>
														</div>
													</div>
<?php }?>													
												</div>
											</div>
										</div>
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
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
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