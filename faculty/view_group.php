<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">
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
if (isset($_REQUEST['nsid']))
{	
	$nsid=$_REQUEST['nsid'];
	mysqli_query($con,"UPDATE notif_stat SET read_status='1' where notif_stat_id='$nsid'")
 or die(mysqli_error()); 

}

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
												<a href="#group_quizzes" data-toggle="tab">
												Quizzes </a>
											</li>
											<li>
												<a href="#group_members" data-toggle="tab">
												Members </a>
											</li>
											<li>
												<a href="#settings" data-toggle="tab">
												Settings </a>
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
	
	$query1=mysqli_query($con,"select * from post natural join group_post natural join `group` natural join subject where group_id='$gid' order by post_date desc")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "<h4 class='text-red'>You have not created any post yet!</h4>";
			while($row1=mysqli_fetch_array($query1))
			{
			$pid=$row1['post_id'];	
			$cys=$row1['cys'];	
			$subject=$row1['subject_code'];	
			$gid=$row1['group_id'];	
			$due=$row1['due_date'];
			$gpid=$row1['group_post_id'];
			$file="uploads/$row1[post_file]";
			$ext = pathinfo($file, PATHINFO_EXTENSION);	
			include("ext.php");		

			$member_id=$row1['member_id'];	
			$gpid=$row1['group_post_id'];	

			$query=mysqli_query($con,"select * from member where member_id='$member_id'")or die(mysqli_error());
		
				$row=mysqli_fetch_array($query);
?>											
														<div class="item">
															<div class="item-head">
																<div class="item-details">
																	<img class="item-pic" src="../images/<?php echo $row['member_pic'];?>">
																	<a href="" class="item-name primary-link"><?php echo $_SESSION['name'];?></a>
																	<span class="item-label"><?php echo date('M d, Y h:i A',strtotime($row1['post_date']));?></span>
																</div>
															
															</div>
															
															<div class="item-body">
																 <h4><?php echo $row1['post_title'];?>
																 <i class="icon-action-redo font-blue"></i> 
																<a href="view_group.php?gid=<?php echo $gid;?>">
																	<div class="profile-usertitle-job btn btn-circle green-haze btn-sm">
																	 	<?php echo $subject;?> - <?php echo $cys;?>
																	</div>
																</a>
																</h4>
																 <p><?php echo $row1['post_content'];?></p>
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
																
															
<!-- /.edit -->
													<div class="modal fade" id="edit<?php echo $gpid;?>" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																	<h4 class="modal-title">Reply Comment</h4>
																</div>
																<div class="modal-body">
																	<!-- BEGIN SAMPLE FORM PORTLET-->
																<div class="portlet light">
																	
																	<div class="portlet-body form">
																		<form role="form" method="post" action="comment_save.php" enctype='multipart/form-data'>
													<div class="form-group form-md-line-input form-md-floating-label">
													<input type="hidden" class="form-control" id="form_control_1" name="gpid" value="<?php echo $gpid;?>" required>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="comment" required>
														
													</div>
													
													
																			
																		
																	</div>
																</div>
																<!-- END SAMPLE FORM PORTLET-->
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn default" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn blue" name="update">Save changes</button>
																</div>
															</div></form>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>
													<!-- /.modal -->													
				<!--feedback-->		
				<div class="media">
										<h5><a class="btn btn-success" data-toggle="modal" href="#edit<?php echo $gpid;?>">Reply</a></h5>
<?php 
$queryc=mysqli_query($con,"select * from comment natural join group_post natural join post natural join member where group_post_id='$gpid' order by date_posted desc")or die(mysqli_error($con));
	while($rowc=mysqli_fetch_array($queryc)){
	    $comment=$rowc['comment'];
?>
										<a href="javascript:;" class="pull-left">
										<img class="item-pic" src="../images/<?php echo $rowc['member_pic'];?>" style="height: 30px;width: 30px">
										<a href="" class="item-name primary-link"><?php echo $rowc['member_first']." ".$rowc['member_last'];?>
										</a>
										<span class="item-label"><?php echo date('M d, Y h:i A',strtotime($rowc['post_date']));?>
										</span>
										<div class="media-body">
											
											<p>
												 <?php echo nl2br($comment);?>
											</p>
											<hr>
											
										</div>
<?php }?>										
									</div>										

				<!--ffedback-->										
			</div><!--item body-->
		</div><!--item-->
															

		<?php }?>		
													</div>
												</div>
											</div>
											<div class="tab-pane" id="group_quizzes">
												<?php include('group_quizzes.php');?>
											</div>
											<div class="tab-pane" id="group_members">
												<?php include('group_members.php');?>
											</div>
											<div class="tab-pane" id="settings">
												<?php include('settings.php');?>
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
										<div class="portlet box red">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa fa-cogs"></i>Pending Request
											</div>
										</div>
										<div class="portlet-body">
											<div class="table">
												<table class="table table-striped table-bordered table-advance table-hover">
												<tbody>
				<?php
					
					$query1=mysqli_query($con,"select * from enrol natural join member where group_id='$gid' and member_type='student' and status='pending'")or die(mysqli_error());
						
						$countassign=mysqli_num_rows($query1);
						if ($countassign<1) echo "
							<div class='alert alert-danger'>
								You have no pending request!
							</div>";
							while($row2=mysqli_fetch_array($query1))
							{
								$eid=$row2['enrol_id'];
							
				?>										
												<tr>
													<td class="hidden-xs">
														 <?php echo $row2['member_last'];?> <?php echo $row2['member_first'];?>
													</td>
													<td>
														 <?php echo $row2['cys'];?>
													</td>
													<td>
														<a class="btn default btn-xs blue" data-toggle="modal" href="#accept<?php echo $gid;?>">
														<i class="glyphicon glyphicon-ok"></i>  </a>
														<a class="btn default btn-xs red" data-toggle="modal" href="#decline<?php echo $gid;?>">
														<i class="glyphicon glyphicon-remove"></i>  </a>
													</td>
												</tr>
<!-- /.delete -->
							<div class="modal fade bs-modal-sm" id="accept<?php echo $gid;?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Accept Request</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
											<div class="portlet light">
												
												<div class="portlet-body form">
													<form role="form" method="post" action="accept.php">
														<div class="form-group form-md-line-input form-md-floating-label">
															<input type="hidden" name="gid" value="<?php echo $gid;?>" required>
															<input type="hidden" name="eid" value="<?php echo $eid;?>" required>
															Are you sure you want to enrol <?php echo $row2['member_last'].", ".$row2['member_first'];?> in this class?
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
							<!-- /.delete -->
							<div class="modal fade bs-modal-sm" id="decline<?php echo $gid;?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Decline Request</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
											<div class="portlet light">
												
												<div class="portlet-body form">
													<form role="form" method="post" action="decline.php">
														<div class="form-group form-md-line-input form-md-floating-label">
															<input type="hidden" name="gid" value="<?php echo $gid;?>" required>
															<input type="hidden" name="eid" value="<?php echo $eid;?>" required>
															Are you sure you want to decline <?php echo $row2['member_last'].", ".$row2['member_first'];?> request to enrol in this class?
														</div>
														
														
													
												</div>
											</div>
											<!-- END SAMPLE FORM PORTLET-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Decline</button>
										</div>
											</form>
									</div>
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
									</div>
								</div>
										<!--end of pending request-->			

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
<!-- END PAGE LEVEL SCRIPTS -->
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