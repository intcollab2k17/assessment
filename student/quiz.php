<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Home </title>
<?php include('head.php');?>
	<script language="JavaScript"><!--
		javascript:window.history.forward(1);
//--></script>
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
											<span class="caption-subject font-blue-madison bold uppercase">Quiz</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_posts" data-toggle="tab">
												Active </a>
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
													<br>
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
															Status
														</th>
													</tr>
													</thead>
													<tbody>
						<?php
							include('../includes/dbcon.php');
							$id=$_SESSION['id'];
							$query=mysqli_query($con,"select * from enrol natural join group_quiz where member_id='$id' and group_quiz_stat='active' order by quiz_date desc,quiz_time desc")or die(mysqli_error());
								
								$countassign=mysqli_num_rows($query);
								if ($countassign<1) echo "
									<div class='alert alert-danger'>
										You have quizzes yet!
									</div>";
									while($row=mysqli_fetch_array($query))
									{
									$qid=$row['quiz_id'];
									$gid=$row['group_id'];

									$queryq=mysqli_query($con,"select * from `quiz` where quiz_id='$qid'")or die(mysqli_error());
								
										$rowq=mysqli_fetch_array($queryq);
											$time=$rowq['quiz_duration'];

										$query1=mysqli_query($con,"select * from `group` natural join subject where group_id='$gid'")or die(mysqli_error());
								
										$row1=mysqli_fetch_array($query1);
											$gid=$row1['group_id'];
						?>								
													<tr>
														<td>
															 <?php echo $rowq['quiz_title'];?>
														</td>
														<td>
															 <?php echo $row1['subject_code']." ".$row1['cys'];?>
														</td>
														<td class="center">
															 <?php echo $rowq['quiz_duration'];?> mins
														</td>
														<td class="center">
															 <?php echo date("M d, Y",strtotime($row['quiz_date']));?> 
														</td>
														<td class="center">
															 <?php echo date("h:i a",strtotime($row['quiz_time']));?> 
														</td>
														<td>
															<?php
														      $taken=mysqli_query($con,"select COUNT(*) as counttaken from quiz_result where member_id='$id' and quiz_id='$qid'")or die(mysqli_error());

															$row5=mysqli_fetch_array($taken);
															if ($row5['counttaken']==0)
															{
															  echo "<a class='btn btn-app text-green' href='order.php?qid=$qid&time=$time&gid=$gid'>
																<i class='icon-social-youtube font-blue'></i> Take Test
														      </a>";
														      }
														      else{
														      echo "<a class='btn btn-app btn-danger text-red'>
																<i class='glyphicon glyphicon-remove font-white'></i> Test Already Taken
														      </a>";
															}
														    ?>
														</td>
														
													</tr>
																			
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
													<br>
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
													</tr>
													</thead>
													<tbody>
						<?php
					
							$query=mysqli_query($con,"select * from enrol natural join group_quiz where member_id='$id' and group_quiz_stat='inactive' order by quiz_date desc,quiz_time desc")or die(mysqli_error());
								
								$countassign=mysqli_num_rows($query);
								if ($countassign<1) echo "
									<div class='alert alert-danger'>
										You have quizzes yet!
									</div>";
									while($row=mysqli_fetch_array($query))
									{
									$qid=$row['quiz_id'];
									$gid=$row['group_id'];

									$queryq=mysqli_query($con,"select * from `quiz` where quiz_id='$qid'")or die(mysqli_error());
								
										$rowq=mysqli_fetch_array($queryq);
											$time=$rowq['quiz_duration'];

										$query1=mysqli_query($con,"select * from `group` natural join subject where group_id='$gid'")or die(mysqli_error());
								
										$row1=mysqli_fetch_array($query1);
						?>								
													<tr>
														<td>
															 <?php echo $rowq['quiz_title'];?>
														</td>
														<td>
															 <?php echo $row1['subject_code']." ".$row1['cys'];?>
														</td>
														<td class="center">
															 <?php echo $rowq['quiz_duration'];?> mins
														</td>
														<td class="center">
															 <?php echo date("M d, Y",strtotime($row['quiz_date']));?> 
														</td>
														<td class="center">
															 <?php echo date("h:i a",strtotime($row['quiz_time']));?> 
														</td>
														
														
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
										<!--END TABS-->
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