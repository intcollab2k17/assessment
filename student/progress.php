<?php 
include('session.php');
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
								<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i> Progress
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<a href="export.php?gid=<?php echo $_REQUEST['gid'];?>" id="sample_editable_1_new" class="btn green">
											Export <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
									
									
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									 Name
								</th>
<?php 
	include('../includes/dbcon.php');
	if (isset($_REQUEST['nsid']))
		{	
			$nsid=$_REQUEST['nsid'];
			mysqli_query($con,"UPDATE notif_stat SET read_status='1' where notif_stat_id='$nsid'")
		 or die(mysqli_error()); 

		}

	        $gid=$_REQUEST['gid'];
	            $at=mysqli_query($con,"select * from post natural join group_post where group_id='$gid' and post_type='assignment'")or die(mysqli_error($con));
								    while($row=mysqli_fetch_array($at))
								    {		      
								      echo "<th>$row[post_title]</th>";

								     } 
			$quiz=mysqli_query($con,"select * from quiz natural join group_quiz where group_id='$gid'")or die(mysqli_error($con));
								    while($rowq=mysqli_fetch_array($quiz))
								    {		     
								      $qid=$rowq['quiz_id']; 
								      echo "<th>$rowq[quiz_title]</th>";
								      //echo "<a href='stat1.php?qid=$qid&gid=$gid'>
								      	//	<i class='icon-bar-chart font-blue'></i> </a></th>";

								     } 
?>
							</tr>
							</thead>
							<tbody>
<?php
	$id=$_SESSION['id'];
	$query1=mysqli_query($con,"select * from enrol natural join member where group_id='$gid' and status='approved' and member_id='$id' order by member_last")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "
			<div class='alert alert-danger'>
				You have members yet!
			</div>";
			while($row2=mysqli_fetch_array($query1))
			{
				$member_id=$row2['member_id'];
			
?>								
							<tr>
								<td>
									 <?php echo $row2['member_last'];?>, 
									 <?php echo $row2['member_first'];?>
								</td>
<?php 
            $loop=mysqli_query($con,"select * from post natural join group_post where group_id='$gid' and post_type='assignment'")or die(mysqli_error());
					
					while($row=mysqli_fetch_array($loop))
					{	
						$gpid=$row['group_post_id'];

						$grade=mysqli_query($con,"select * from submission natural join grade where group_post_id='$gpid' and member_id='$member_id'")or die(mysqli_error());

						$rowg=mysqli_fetch_array($grade);
						echo "<th>$rowg[score]/$rowg[total]</th>";
					}

			$quiz=mysqli_query($con,"select * from quiz natural join group_quiz where group_id='$gid'")or die(mysqli_error($con));
					while($rowq=mysqli_fetch_array($quiz))
					   {		
					   		$qid=$rowq['quiz_id'];      
							$quizloop=mysqli_query($con,"select * from quiz_result natural join grade where group_id='$gid' and member_id='$member_id' and quiz_id='$qid'")or die(mysqli_error($con));
						$rowql=mysqli_fetch_array($quizloop);
						echo "<th>$rowql[score]/$rowql[total]</th>";	     
					    } 		
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