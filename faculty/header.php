<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="../assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<?php 
	$id=$_SESSION['id'];
	$query=mysqli_query($con,"select * from notif_stat where member_id='$id' and read_status='0'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query);
?>		
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span class="username username-hide-on-mobile">
							<span class="badge badge-danger">
								<?php echo $count;?> </span>
							<i class="icon-bell"></i> 
						</a>
						<ul class="dropdown-menu dropdown-menu-default" style="width: 300px!important">
<?php 
	$q1=mysqli_query($con,"select * from notif_stat natural join notif where member_id='$id' and read_status='0' order by notif_stat_id")or die(mysqli_error($con));
		while($r1=mysqli_fetch_array($q1))
		{
			$gid=$r1['group_id'];	

			$q2=mysqli_query($con,"select * from `group` natural join subject where group_id='$gid'")or die(mysqli_error($con));
				$r2=mysqli_fetch_array($q2);

?>							
							<li style="width: 300px!important">
								<a href="<?php echo $r1['link'];?>&nsid=<?php echo $r1['notif_stat_id'];?>">
								<?php echo $r1['notif'];?> </a>
							</li>
<?php }?>							
						</ul>
					</li>
					
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						
						<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
						<img alt="" class="img-circle" src="../images/<?php echo $_SESSION['pic'];?>"/>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							
							<li>
								<a href="logout.php">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->