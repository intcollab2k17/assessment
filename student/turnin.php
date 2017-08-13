<?php
	    $query2=mysqli_query($con,"select COUNT(*) as submitted,due_date from submission natural join group_post where group_post_id='$gpid' and member_id='$id'")or die(mysqli_error());
			$row2=mysqli_fetch_array($query2);
			$count=$row2['submitted'];
				if($count>0)
				{
				  $href="#";
				  $error="submitted";

				}
				else
				{
					{
				  $href="#submit$gpid";

				}
				}
?> 
<div class="row">
<div class="col-md-12">
 	<a class="" data-toggle="modal" href="<?php echo $href;?>">
	<div class="tiles">
		<div class="tile bg-yellow">
			<div class="tile-body">
				<i class="icon-login"></i>
			</div>
			<div class="tile-object">
				<div class="name">
					Turn In
				</div>
				<div class="number">
					<?php echo $count;?>
				</div>
			</div>
		</div>
	</div>							
	</a>
</div>			
</div>
<!-- /.edit -->
							<div class="modal fade bs-modal-sm" id="submit<?php echo $gpid;?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Submit Assignment</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN SAMPLE FORM PORTLET-->
										<div class="portlet light">
											
											<div class="portlet-body form">
												<form role="form" method="post" action="submit.php" enctype='multipart/form-data'>
													<div class="form-group form-md-line-input form-md-floating-label">
														<input type="hidden" class="form-control" id="form_control_1" name="mid" value="<?php echo $mid;?>" required>
														<input type="hidden" class="form-control" id="form_control_1" name="id" value="<?php echo $gpid;?>" required>
														<input type="hidden" class="form-control" id="form_control_1" name="gid" value="<?php echo $gid;?>" required>
														<input type="hidden" class="form-control" id="form_control_1" name="due" value="<?php echo $row2['due_date'];?>" required>
														<textarea class="form-control" id="form_control_1" name="content" required></textarea> 
														<label for="form_control_1">Content/Description</label>
														<span class="help-block">Content/Description</span>
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
																Select file </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="image">
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a>
															</div>
														</div>
													</div>
													
												
											</div>
										</div>
										<!-- END SAMPLE FORM PORTLET-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Submit</button>
										</div>
									</div></form>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->														