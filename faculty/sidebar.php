<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start ">
					<a href="home.php">
					<i class="icon-home"></i>
					<span class="title">Home</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-users"></i>
					<span class="title">Group</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="groups.php">
							<i class="icon-user-follow"></i>
							Create Group</a>
						</li>
<?php

	$id=$_SESSION['id'];
	
		$queryg=mysqli_query($con,"select * from `group` natural join subject where group_stat='Active' order by subject_code")or die(mysqli_error($con));
				 $countassign=mysqli_num_rows($queryg);
				  if ($countassign<1) echo "<h4 class='text-red'>You have not created any class yet!</h4>";
						while($rowg=mysqli_fetch_array($queryg))
						{

?>							
						<li>
							<a href="view_group.php?gid=<?php echo $rowg['group_id'];?>">
							<i class="icon-user"></i>
							<?php echo $rowg['subject_code']." ".$rowg['cys'];?></a>
						</li>
<?php }?>			
						<li>
							<a href="groups.php">
							<i class="icon-user-follow"></i>
							View All</a>
						</li>			
					</ul>
				</li>
				<li>
					<a href="quiz.php">
					<i class="icon-puzzle"></i>
					<span class="title">Quiz</span>
					</a>
				</li>
				<li>
					<a href="report.php">
					<i class="icon-bar-chart"></i>
					<span class="title">Report</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
<?php
		
		$query1=mysqli_query($con,"select * from `group` natural join subject where group_stat='Active' order by subject_code")or die(mysqli_error($con));
				 $countassign=mysqli_num_rows($query1);
				  if ($countassign<1) echo "<h4 class='text-red'>You have not created any class yet!</h4>";
						while($row2=mysqli_fetch_array($query1))
						{

?>												
						<li>
							<a href="progress.php?gid=<?php echo $row2['group_id'];?>">
							<?php echo $row2['subject_code']." ".$row2['cys'];?></a>
						</li>
<?php }?>						
					</ul>
				</li>
				
				<li>
					<a href="archive.php">
					<i class="icon-folder"></i>
					<span class="title">Archive</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php
		
		$querya=mysqli_query($con,"select * from `group` natural join subject where group_stat='Archived' order by subject_code")or die(mysqli_error($con));
				 $countassign=mysqli_num_rows($querya);
				  if ($countassign<1) echo "<h4 class='text-red'>You have no archived yet!</h4>";
						while($rowa=mysqli_fetch_array($querya))
						{

?>												
						<li>
							<a href="view_archived.php?gid=<?php echo $rowa['group_id'];?>">
							<?php echo $rowa['subject_code']." ".$rowa['cys'];?></a>
						</li>
<?php }?>						
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->