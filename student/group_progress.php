<div class="portlet light">
						<div class="portlet-body">
							<div class="table-scrollable">
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							
							
<?php 
	include('../includes/dbcon.php');

        $gid=$_REQUEST['gid'];
        $id=$_SESSION['id'];

            $at=mysqli_query($con,"select * from grade join post where grade.post_id=post.post_id and group_id='$gid' and post_type='assignment'")or die(mysqli_error());
							    while($row=mysqli_fetch_array($at))
							    {		      
							      echo "<tr><th>$row[post_title] </th><th>$row[score]/$row[total]</th></tr>";

							     } 
		$quiz=mysqli_query($con,"select * from grade join quiz where grade.quiz_id=quiz.quiz_id and group_id='$gid' and post_type='quiz'")or die(mysqli_error($con));
							    while($rowq=mysqli_fetch_array($quiz))
							    {		     
							      $qid=$rowq['quiz_id']; 
							      echo "<th>$rowq[quiz_title]";
							      echo "<a href='stat.php?qid=$qid&gid=$gid'>
							      		<i class='icon-bar-chart font-blue'></i> </a></th></tr>";

							     } 
?>							
							</tbody>
							</table>
	</div>
						</div>
					</div>