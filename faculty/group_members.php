<div class="portlet light">
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-striped table-bordered table-advance table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										<i class="icon-note"></i> ID Number
									</th>
									<th>
										<i class="icon-user"></i> Last Name
									</th>
									<th class="hidden-xs">
										First Name
									</th>
									<th class="hidden-xs">
										<i class="icon-envelope-open"></i> Email
									</th>
									
									<th>
									</th>
								</tr>
								</thead>
								<tbody>
<?php
	
	$query1=mysqli_query($con,"select * from enrol natural join member where group_id='$gid' and member_type='student' and status='approved' order by member_last")or die(mysqli_error());
		
		$countassign=mysqli_num_rows($query1);
		if ($countassign<1) echo "
			<div class='alert alert-danger'>
				You have members yet!
			</div>";
			$i=1;
			while($row2=mysqli_fetch_array($query1))
			{
			
?>										
								<tr>
									<td class="highlight">
										<div class="success">
										</div>
										<a href="javascript:;">
										<?php echo $i;?> </a>
									</td>
									<td class="hidden-xs">
										<div class="success">
										</div>
										<?php echo $row2['id_no'];?>
									</td>
									<td class="hidden-xs">
										<div class="success">
										</div>
										<?php echo $row2['member_last'];?>
									</td>
									<td class="hidden-xs">
										 <?php echo $row2['member_first'];?>
									</td>
									<td>
										 <?php echo $row2['email'];?>
									</td>
									
								</tr>
<?php $i++;}?>								
								</tbody>
								</table>
							</div>
						</div>
					</div>