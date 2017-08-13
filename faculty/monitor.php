<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include('title.php');?> | Home </title>
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
							<form name="question" method="post" action="question_save.php">
				
								<div class="portlet">
									<div class="portlet-title">
										<div class="caption caption-md">
											
<?php
				    include('../includes/dbcon.php');
				    
				    $gqid=$_REQUEST['gqid'];
				    $gid=$_REQUEST['gid'];
					
					$query0=mysqli_query($con,"select * from group_quiz natural join quiz natural join `group` natural join subject where group_quiz_id='$gqid'")or die(mysqli_error($con));
						$row0=mysqli_fetch_array($query0);
							$qid=$row0['quiz_id'];
				    $query=mysqli_query($con,"select * from enrol natural join member where group_id='$gid' and status='approved'")or die(mysqli_error($con));
				    	
				  ?>
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Quiz Title: <?php echo $row0['quiz_title'];?></span><br>
											<span class="caption-subject font-blue-madison bold uppercase">Group: <?php echo $row0['cys']." - ".$row0['subject_code'];?></span>
										</div>
									</div>
									<div class="portlet-body">
						
							<div class="table-scrollable table-scrollable-borderless">
								<table class="table table-hover table-light">
								<thead>
								<tr class="uppercase">
									<th colspan="2">
										 Student
									</th>
									<th>
										 Quiz Status (if taken)
									</th>
								</tr>
								</thead>
								<tbody>
<?php while($row=mysqli_fetch_array($query)){
	$mid=$row['member_id'];
	$query1=mysqli_query($con,"select * from quiz_result where quiz_id='$qid' and member_id='$mid'")or die(mysqli_error($con));
			if (mysqli_num_rows($query1)>0)
			{
				$status="<span class='label label-sm label-success'>Yes</span>";
			}
			else
			{
				$status="<span class='label label-sm label-danger'>No</span>";
			}
?>								
								<tr>
									<td class="fit">
										<img class="user-pic" src="../images/<?php echo $row['member_pic'];?>" style="width:30px;height: 30px">
									</td>
									<td>
										<a href="javascript:;" class="primary-link"><?php echo $row['member_last'].", ".$row['member_first'];?></a>
									</td>
									<td>
										<span class="bold theme-font-color"><?php echo $status;?></span>
									</td>
								</tr>
<?php }?>								
								</tbody>
							</table>
							</div>
						</div>
				<!--monitor end-->

										</div>
										<!--END TABS-->
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
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features\
Profile.init(); // init page demo
});
</script>

</body>
<!-- END BODY -->
</html> 	