<?php

    include('session.php');
	$user=$_SESSION['user'];
  $query=mysqli_query($con,"select * from comment natural join group_post natural join post")or die(mysqli_error($con));
	while($row=mysqli_fetch_array($query)){
	    $comment=$row['comment'];
	    //$first=$row['firstname'];	
	    //$time=$row['time'];
		
 ?>		
		<div class="showme well col-md-12">
			<div class="media">
			  <div class="media-left">
				<a href="#">
				  <img class="media-object" src="dist/upload/<?php //echo $pic;?>" width="50px">
				</a>
			  </div>
			  <div class="media-body">
				<h5 class="media-heading"><a href="profile_view.php?id=<?php //echo $alumni_id;?>">
				<?php echo $first." ".$last;?></a>
				<?php 
						if ($user==$alumni_id){
						  echo "<span class='action pull-right'><a href='#' class='delete' id='$post_id'>x</a></span>";
						}
					?>		
				</h5>
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<small><i class="glyphicon glyphicon-calendar"></i>
						<b>
						<?php echo date('M j, Y', strtotime($date));?>
						</small>
					</div>
					<div class="col-md-6 col-xs-12">
						<small>
						<i class='glyphicon glyphicon-time'></i>Time:<?php echo date('h:i a', strtotime($time));?>
						</b>
						</small><br>
					</div>
				</div>
				<hr>
				<?php echo nl2br($comment);?>
				<hr style="margin-bottom:5px">
<?php 
	
	$query1=mysqli_query($con,"select * from comment natural join alumni where post_id='$post_id' 
		order by date_posted desc,time desc")or die(mysqli_error($con));
			$num=mysqli_num_rows($query1);	
			
	?>	
				<a class="commentbtn" id="commentbtn<?php echo $post_id;?>">
					<i class="glyphicon glyphicon-comment"></i> Comment (<?php echo $num;?>)
				</a>
				<hr style="margin-top:5px;margin-bottom:10px">
				
				<form method="post" action = "comment_save.php" id="reg-form1">
						<div class="row">	
							<div class="col-md-8">
								<input type="hidden" name="post_id" value="<?php echo $post_id;?>">
								<textarea id="comment" name="comment" class="form-control" rows="1"></textarea>
							</div>
							<div class="col-md-4">		
								<button type="submit" class="btn btn-primary postcomment" id="postcomment<?php echo $post_id;?>">Comment</button>
							</div>
						</div>
				</form>
					
			<!----	<script>				
					$("#reg-form1").on('submit', function()
				{  
				$.post('comment_save.php', $(this).serialize(), function(data)
				{
			   $(".result").html(data);  
					$(".result").load("post.php");
				
				});			  
				return false;			
				})		
//----------------------
						
				</script> -->
					
	

	<?php 	
		while($row1=mysqli_fetch_array($query1)){
			$last1=$row1['lastname'];
			$first1=$row1['firstname'];
			$alumni_id1=$row1['alumni_id'];
			$pic1=$row1['pic'];
			$comment=$row1['comment'];
			$cid=$row1['comment_id'];
			
			
	?>	
				<div class = "media commentlist" id="<?php echo $post_id;?>" style="">
					 <a class = "pull-left" href = "#">
						<img class = "media-object" src = "dist/upload/<?php echo $pic1;?>" alt = "Media Object" width="50px">
					 </a>
         
					 <div class = "media-body">
						<h5 class="media-heading"><a href="profile_view.php?id=<?php echo $alumni_id1;?>">
							<?php echo $first1." ".$last1;?></a>
							<?php 
									if ($user==$alumni_id1){
									  echo "<span class='action pull-right'><a href='#' class='deletec' id='$cid'>x</a></span>";
									}
								?>		
							</h5>
						<?php echo $comment;?>
						<hr>
						
					 </div>
				</div>
				
	<?php }?>					 
						
				
					
			  </div>
			  
			</div>
		</div>
		
		
				
							
						
		
<?php }?><br><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(".commentbtn").on('click', function()
		 {  
		   var Id = this.id;//$(".result").html(data);  
		   //alert(Id);
		   
			$(this).siblings(".commentlist").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "toggle" }, "slow");
		 
		})
</script>
<script type="text/javascript">
	
//---------------------------------------
	$(function() {
	$(".delete").click(function(){
	var element = $(this);
	var del_id = element.attr("id");
	var info = 'id=' + del_id;
	if(confirm("Are you sure you want to delete this?"))
	{
	 $.ajax({
	   type: "POST",
	   url: "post_del.php",
	   data: info,
	   success: function(){
	 }
	});
	  $(this).parents(".showme").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "hide" }, "slow");
	 }
	return false;
	});
	});
//--------------------------------------------------
$(function() {
	$(".deletec").click(function(){
	var element = $(this);
	var del_id = element.attr("id");
	var info = 'id=' + del_id;
	if(confirm("Are you sure you want to delete this?"))
	{
	 $.ajax({
	   type: "POST",
	   url: "comment_del.php",
	   data: info,
	   success: function(){
	 }
	});
	  $(this).parents(".commentlist").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "hide" }, "slow");
	 }
	return false;
	});
	});
	//--------------------------------------------------
</script>