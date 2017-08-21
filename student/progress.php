<?php 
include('session.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Progress</title>
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
							<div class="col-md-12">
								<!-- BEGIN PORTLET -->
								<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i> Progress
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							
							
<?php 
	include('../includes/dbcon.php');
	if (isset($_REQUEST['nsid']))
	{	
		$nsid=$_REQUEST['nsid'];
		mysqli_query($con,"UPDATE notif_stat SET read_status='1' where notif_stat_id='$nsid'")
	 or die(mysqli_error()); 

	}
        $gid=$_REQUEST['gid'];
        $id=$_SESSION['id'];
        
            $at=mysqli_query($con,"SELECT * FROM `grade` join post where grade.post_id=post.post_id and grade.group_id='$gid' and grade.member_id='$id'")or die(mysqli_error($con));
							    while($row=mysqli_fetch_array($at))
							    {
							    $gid=$row['grade_id'];	
										      
							      echo "<tr><th>$row[post_title]</th>";
							      echo "<th>$row[score]/$row[total]</th>";
							       if ($row['type']=="assignment")
							      {
							      
							      	echo "<th></th>";
		
							      }
	
?>
							
							</tr>
													
<?php }?>
<?php 

            $quiz=mysqli_query($con,"SELECT * FROM `grade` join quiz where grade.quiz_id=quiz.quiz_id and grade.group_id='$gid' and grade.member_id='$id'")or die(mysqli_error($con));
							    while($q=mysqli_fetch_array($quiz))
							    {
										
								$qid=$q['quiz_id'];		      
							      echo "<tr><th>$q[quiz_title]</th>";
							      echo "<th>$q[score]/$q[total]</th>";

							      
							      	echo "<th><a href='stat.php?qid=$qid'>
							      	<i class='icon-bar-chart font-blue'></i> </a></th>";
							      
?>
							
							</tr>
													
<?php }?>							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
								<!-- END PORTLET -->
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
<?php include('footer.php');?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../../assets/global/plugins/respond.min.js"></script>
<script src="../../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
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