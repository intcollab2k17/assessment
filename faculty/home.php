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
							<div class="col-md-8">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Feeds</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_posts" data-toggle="tab">
												Posts </a>
											</li>
											
										</ul>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
										<div class="tab-content">
											<div class="tab-pane active" id="tab_posts">
												<div data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<div class="general-item-list">
<?php
	
	$id=$_SESSION['id'];
	
	$query1=mysqli_query($con,"select * from post natural join group_post natural join `group` natural join subject where member_id='$id' and group_stat='Active' order by post_date desc")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "<h4 class='text-red'>You have not created any post yet!</h4>";
			while($row2=mysqli_fetch_array($query1))
			{
			$pid=$row2['post_id'];	
			$cys=$row2['cys'];	
			$gid=$row2['group_id'];	
			$member_id=$row2['member_id'];	
			$gpid=$row2['group_post_id'];	
			$subject=$row2['subject_code'];

			$query=mysqli_query($con,"select * from member where member_id='$member_id'")or die(mysqli_error());
		
				$row=mysqli_fetch_array($query);
			
?>			
									
			<div class="item portlet light" style="padding-top: 10px">
				<div class="item-head">
					<div class="item-details">
						<img class="item-pic" src="../images/<?php echo $row['member_pic'];?>">
						<a href="" class="item-name primary-link"><?php echo $row['member_first']." ".$row['member_last'];?>
						</a>
						<span class="item-label"><?php echo date('M d, Y h:i A',strtotime($row2['post_date']));?>
						</span>
					</div>
				</div>
				<div class="item-body">
					<h4>
						<?php echo $row2['post_title'];?>
					 	<i class="icon-action-redo font-blue"></i> 
						<a href="view_group.php?gid=<?php echo $gid;?>">
							<div class="profile-usertitle-job btn btn-circle green-haze btn-sm">
							 	<?php echo $subject;?> - <?php echo $cys;?>
							</div>
						</a>
					</h4>
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
$queryc=mysqli_query($con,"select * from comment natural join group_post natural join member where group_post_id='$gpid' order by date_posted desc")or die(mysqli_error($con));
	while($rowc=mysqli_fetch_array($queryc)){
	    $comment=$rowc['comment'];
?>
										<a href="javascript:;" class="pull-left">
										<img class="item-pic" src="../images/<?php echo $rowc['member_pic'];?>" style="height: 30px;width: 30px">
										<a href="" class="item-name primary-link"><?php echo $rowc['member_first']." ".$rowc['member_last'];?>
										</a>
										<span class="item-label"><?php echo date('M d, Y h:i A',strtotime($rowc['date_posted']));?>
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
											
										</div>
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
													<i class=" icon-notebook font-red-sunglo"></i>
													<span class="caption-subject bold uppercase"> Add Post</span>
												</div>
											</div>
											<div class="portlet-body form">
												<form role="form" method="post" action="post_add.php" enctype='multipart/form-data'>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="title" required>
														<label for="form_control_1">Post Title</label>
														<span class="help-block">Title of Post</span>
													</div>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="text" class="form-control" id="form_control_1" name="desc" required>
														<label for="form_control_1">Post Description/Instruction</label>
														<span class="help-block">Description/Instruction of Post</span>
													</div>
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px;">
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select File </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="image">
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a>
															</div>
														</div>
													</div>
													<div class="form-group form-md-checkboxes">
															<label>Check if assignment</label>

															<div class="md-checkbox-inline">			
																<div class="md-checkbox">
																	<input type="checkbox" id="assign" class="md-check" value="assign" name="assign">
																	<label for="assign">
																	<span class="inc"></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	Assignment </label>
																</div>
															</div>
														</div>
													<div class="form-group form-md-line-input form-md-floating-label" id="points">
														<input type="number" class="form-control" id="form_control_1" name="points">
														<label for="form_control_1">Points</label>
														<span class="help-block">No. of Points</span>
													</div>
													
													<div class="form-body">
														<div class="form-group form-md-line-input form-md-floating-label" id="date">
															<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" name="date">
															
													<span class="help-block">Due Date for Assignment</span>
														</div>
														<div class="form-group form-md-line-input form-md-floating-label" id="time">
																	<input type="text" class="form-control timepicker timepicker-no-seconds" name="time">
																	<span class="input-group-btn">
																	Time
																	</span>
															
														</div>
														<div class="form-group form-md-checkboxes">
															<label>Groups</label>

															<div class="md-checkbox-inline">
<?php
			
		$query=mysqli_query($con,"select * from `group` natural join subject where member_id='$id' and group_stat='Active'")or die(mysqli_error());
  			while ($row=mysqli_fetch_array($query)){
?>																
																<div class="md-checkbox">
																	<input type="checkbox" id="<?php echo $row['group_id'];?>" class="md-check" value="<?php echo $row['group_id'];?>" name="group[]">
																	<label for="<?php echo $row['group_id'];?>">
																	<span class="inc"></span>
																	<span class="check"></span>
																	<span class="box"></span>
																	<?php echo $row['subject_code']." ".$row['cys'];?> </label>
																</div>
<?php }?>																													
															</div>
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