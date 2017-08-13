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
					<!-- END BEGIN PROFILE SIDEBAR
					 -->
<?php 

$gpid=$_REQUEST['gpid'];
$query=mysqli_query($con,"select * from `group_post` natural join post natural join `group` natural join subject where group_post_id='$gpid'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);
?>		
<?php
	$gid=$row['group_id'];
		$count=mysqli_query($con,"select COUNT(*) as count from enrol where group_id='$gid'")or die(mysqli_error());
				  $count=mysqli_fetch_array($count);
				  
?>  
								 
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="col-md-12">
							<div class="row">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">
											<?php echo $row['subject_code']." ".$row['cys'];?></span>
											<h4><b>Members (<?php echo $count['count'];?>)
											</b>
											</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="portlet light">							
									<div class="general-item-list">
<?php
	
	$id=$_SESSION['id'];
	$gpid=$_REQUEST['gpid'];
	$query1=mysqli_query($con,"select * from post natural join group_post natural join `group` where group_post_id='$gpid' order by post_date desc")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "<h4 class='text-red'>You have not created any post yet!</h4>";
			while($row2=mysqli_fetch_array($query1))
			{
			$pid=$row2['post_id'];	
			$cys=$row2['cys'];	
			$gid=$row2['group_id'];	
			$member_id=$row2['member_id'];	
			$gpid=$row2['group_post_id'];	

			$query=mysqli_query($con,"select * from member where member_id='$member_id'")or die(mysqli_error());
		
				$row=mysqli_fetch_array($query);
			
?>										<div class="item">
											<div class="item-head">
												<div class="item-details">
													<span class="item-name primary-link">
														<h3><?php echo $row2['post_title'];?>
													</h3>
													</span>
												</div>
												
											</div>
											<div class="item-body">
												<p><?php echo $row2['post_content'];?></p>
												<?php
													
													$query2=mysqli_query($con,"select * from post where post_id='$pid'")or die(mysqli_error());
														$row1=mysqli_fetch_array($query2);
																$file="../uploads/$row2[post_file]";
																$pid=$row1['post_id'];
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
											</div><!--item body-->
										</div><!--item-->
									</div><!--general-->
</div>
							
							<div class="row">
<?php

	
	$query1=mysqli_query($con,"select * from submission natural join member where group_post_id='$gpid' order by date_submitted desc")or die(mysqli_error($con));
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "<div class='alert alert-danger'>No submissions yet!</div>";
			while($row1=mysqli_fetch_array($query1))
			{
			//$pid=$row1['post_id'];	
			$cys=$row1['cys'];	
			$gpid=$row1['group_post_id'];	
			$member_id=$row1['member_id'];
			$status=$row1['status'];

			if ($status=="late")
			{
				$color="danger";
			}
			else
			{
				$color="success";
			}

?>													
					<div class="col-md-12">
						<div class="portlet light">							
							<div class="general-item-list">		
								<div class="item">
									<div class="item-head">
										<div class="item-details">
											<img class="item-pic" src="../images/<?php echo $row1['member_pic'];?>" style="height: 50px;width: 50px">
											<a href="" class="item-name primary-link"><?php echo $row1['member_first']." ".$row1['member_last'];?></a>
												<span class="item-label"><?php echo date('M d, Y h:i A',strtotime($row1['date_submitted']));?></span>

										</div>
										<span class="item-status" style="font-size: 14px"><span class="badge badge-empty badge-<?php echo $color;?>"></span> <?php echo strtoupper($status);?></span>
									</div>
									<div class="item-body">
										
											<p><?php echo $row1['content'];
												$file1="../uploads/$row1[post_file]";
													$ext1 = pathinfo($file1, PATHINFO_EXTENSION);	
														include("ext1.php");
											?></p>
											<!-- BEGIN Note-->
											<div class="note note-info">
												<p>
												 <a  data-placement="bottom" title="Download" id="<?php echo $row1['upload_id']; ?>Download" href="../uploads/<?php echo $row1['post_file']; ?>">
													<img class="attachment-img" src="../images/<?php echo $display; ?>" alt="attachment image" style="width:50px">
														<?php echo $row1['post_file'];
															
														?></a>

														<?php include("size.php");?>
												</p>
											</div><!-- end Note-->
															<div class="row" id="score">			
																<div class="box-tools col-md-12 col-xs-12">
																	<form method="post" action="get_score.php">
																	 <div class="box-tools col-md-3 col-xs-6">
																		<input type="hidden" value="<?php echo $gpid;?>" name="gpid">
																		
<?php $query3=mysqli_query($con,"select * from submission left join grade on submission.grade_id=grade.grade_id where submission.member_id='$member_id' and group_post_id='$gpid'")or die(mysqli_error());
		$row3=mysqli_fetch_array($query3);
?>
								<input type="number" class="form-control" placeholder="Score" name="score" value="<?php echo $row3['score'];?>">
								<input type="hidden" value="<?php echo $row3['submission_id'];?>" name="sid">
								<input type="hidden" value="<?php echo $gid;?>" name="gid">
								<input type="hidden" value="<?php echo $member_id;?>" name="member_id">
								<input type="hidden" value="<?php echo $row3['grade_id'];?>" name="grade_id">
								<input type="hidden" value="<?php echo $pid;?>" name="pid">
							 </div>
							 <div class="box-tools col-md-3  col-xs-6">			
								<input type="text" class="form-control" placeholder="Total" value="<?php echo $row2['points'];?>" name="total" readonly>
							 </div>
							 <div class="box-tools col-md-4  col-xs-5">			
								<button class="btn btn-primary" type="submit" name="update">Save</button>
								<button type="reset" class="btn">Clear</button>
							 </div>
							 </form>
						  </div><!-- /.box-tools -->
																			
										
				</div>			</div></div></div></div></div>	
				<?php }?>														

		<?php }?>									 			
												
							
									
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