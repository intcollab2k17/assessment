<?php 
include('session.php');
if(empty($_SESSION['quiz_id'])):
header('Location:quiz.php');
endif;
error_reporting(0);
date_default_timezone_set("Asia/Manila");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
<title><?php include('title.php');?> | Take Quiz</title>
	<?php include('head.php');?>

    <?php $current=date("H:i:s");?>	
    <script language="JavaScript"><!--
    javascript:window.history.forward(1);
//--></script>
  </head>
  <body class="page-md page-header-fixed page-sidebar-closed page-sidebar-closed-hide-logo">
	<?php // include('header.php');?>
	<div class="clearfix">
	</div>

	<div class="page-container">
		<?php //include('sidebar.php');?>
		
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content" id="fullscreen" style="margin-top: -100px">
				<!-- BEGIN PAGE CONTENT-->
<?php
	include('../includes/dbcon.php');
	$quiz_id=$_SESSION['quiz_id'];
	$sid=$_SESSION['id'];

	$query=mysqli_query($con,"select * from quiz where quiz_id='$quiz_id'")or die(mysqli_error());
	    $row=mysqli_fetch_array($query);		    
?>				
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-puzzle"></i>Quiz Title: <?php echo $row['quiz_title'];?>
								</div>
								<div class="tools">
									<?php $dif=strtotime($_SESSION['end'])-strtotime($current);
											$hour=floor($dif/3600);
											$minutes=$dif/60;
											$sec=$dif%60;
											$timer=$dif*1000;
											$left=$hour.":".$minutes.":".$sec;
										?>
				  						<span class="btn btn-danger"><i class="glyphicon glyphicon-bell"></i><div id="hms"><?php echo $left;?></div></span>
								</div>
							</div>
							<div class="portlet-body" style="min-height: 450px">
								<table class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>
										 Duration: <?php echo $row['quiz_duration'];?> minute/s
									</th>
									<th>
										 Item #: 
										 <?php
			
											$sid=$_SESSION['id'];
											$query1=mysqli_query($con,"select * from question_order where quiz_id='$quiz_id' and member_id='$sid'")or die(mysqli_error($con));
											    while ($row1=mysqli_fetch_array($query1)){
										      ?>
											      <a href="take_quiz.php?qid=<?php echo $row1['question_id'];?>" class="btn btn-warning">
												<?php echo $row1['q_order'];?>
											      </a>     
											   <?php }?> 
									</th>
								</tr>
								</thead>
								</table>
<?php
		$quiz_id=$_SESSION['quiz_id'];
		$question_id=$_SESSION['question_id'];
		if (isset($_REQUEST['qid']))
		{$question_id=$_REQUEST['qid'];}
		
		$query=mysqli_query($con,"select *,question_order.answer as stud_answer from question natural join question_order where quiz_id='$quiz_id' and question_id='$question_id' and member_id='$sid'")or die(mysqli_error($con));
		
		    $i=0;
		    $row=mysqli_fetch_array($query);
		      $question_id=$row['question_id'];
			  $stud_answer=$row['stud_answer'];
		      $i++;
?>					
					<form method="post" action="quiz_update.php" name="finish1" id="finish1">
						<input type="hidden" value="<?php echo $quiz_id;?>" name="quiz_id">
						<input type="hidden" value="<?php echo $question_id;?>" name="question_id">
						<input type="hidden" value="<?php echo $row['points'];?>" name="points">
						<?php 
							$query1=mysqli_query($con,"select * from question_order where question_id='$question_id' and member_id='$sid'")or die(mysqli_error($con));

								$row1=mysqli_fetch_array($query1);
						?>

						<input type="hidden" value="<?php echo $row1['q_order'];?>" name="qorder">
						<input type="hidden" value="<?php echo $row1['order_id'];?>" name="order_id">

								<div class="well well-lg" style="min-height: 400px">
									<h3 class="block">
										Item #: <span class="label label-success"><?php echo $row1['q_order'];?></span> - 
										<?php echo $row['question_type']." (".$row['points'];?>pt/s)
									</h3>
									
										 <input type="hidden" value="<?php echo $row['question_type'];?>" name="type">
										 <h4 class="well bg-blue"><?php echo $row['question'];?></h4>

									
									<div class="col-md-12">
										<?php
		      							$query1=mysqli_query($con,"select * from answer where question_id='$question_id'")or die(mysqli_error());
		      
										    if ($row['question_type']=="Multiple Choice")
											{
												while ($row1=mysqli_fetch_array($query1)){
												    $letter=$row1['letter'];
												    $choices=$row1['choices'];
												   
												    if ($letter<>$stud_answer){$checked="";}
												    else $checked="checked";
												   
												echo "
												  <div class='form-group form-md-radios'>
													  		<div class='md-radio-inline'>
																<div class='md-radio'>
													    			<input type='radio' name='answer' value='$letter' id='$letter' class='md-radiobtn' $checked>
															    		<label for='$letter'>
																		<span></span>
																		<span class='check'></span>
																		<span class='box'></span>
																		$letter.$choices</label>
														    	</div>
													    	</div>
												  </div>
												";
											      }
											}
			
											if ($row['question_type']=="True or False")
											{
												while ($row2=mysqli_fetch_array($query1)){
												    $choices=$row2['choices'];
												  
												    if ($choices==$stud_answer)$checked="checked";
													elseif ($stud_answer=="")$checked=" ";
												   else $checked="";
												   
												echo "
												  
													  <div class='form-group form-md-radios'>
													  		<div class='md-radio-inline'>
																<div class='md-radio'>
												    				<input type='radio' name='answer' value='$choices'  class='md-radiobtn' id='$choices' $checked> 
												    					<label for='$choices'>
																		<span></span>
																		<span class='check'></span>
																		<span class='box'></span>
																		$choices</label>
												    			</div>
												    		</div>
												      </div>
												  
												";
												      }
											}


											if ($row['question_type']=="Modified True or False")
											{
												$row3=mysqli_fetch_array($query1);
												  $answer=$row['answer'];
												  echo "
												  <div class='col-md-3'>
												    <input class='form-control' type='text' name='answer' value='$answer'>
												  </div>
												";
											}

											if ($row['question_type']=="Identification")
											{
												$answer=$row['answer'];
												echo "
												  <div class='col-md-6'>
												    <input class='form-control' type='text' name='answer' value='$answer'>
												  </div>
												";
											}
											if ($row['question_type']=="Enumeration")
											{
											  $i=0;
											  while ($row3=mysqli_fetch_array($query1)){
											      $choices=$row3['choices'];
											      $answer=$row['answer'];
												 
												     $answer=explode(",",$answer);
												      echo "
													<div class='col-md-12'>
													  <input type='text' name='answer[]' value='$answer[$i]'>
													</div>
												      ";
												      $i++;
												 
											  }
											}
											if ($row['question_type']=="Matching Type")
											{
												echo "
												<div class='col-lg-12'>
												  <div class='col-md-4'>
												    <h4>Answer</h4>
												  </div>
												  <div class='col-md-4'>
												    <h4>COLUMN A</h4>
												  </div>
												  <div class='col-md-4'>
												   <h4>COLUMN B</h4>
												  </div>
												</div>"; 
												$i=0;
											while ($row4=mysqli_fetch_array($query1)){	
											    $choices=$row4['choices'];
											    $cola=$row4['cola'];
											    $letter=$row4['letter'];
											    $answer=$row['answer'];
											    
											    echo "
											    <div class='col-lg-12'>
											      <div class='col-md-4'>
												";
												$answer1=explode(",",$answer);
												echo "	<input type='text' name='answer[]' value='$answer1[$i]'>  
												<input type='hidden' name='answer_id[]' value='$row4[answer_id]'>
											      </div>
											      <div class='col-md-4'>
												$cola
											      </div>
											      <div class='col-md-4'>
											      $letter.
												$choices
											      </div>
											    </div><br>
											    ";$i++;
												  }
											}
								         ?>	
                    <div class="footer">
                    <?php 
		      $quiz_id=$_SESSION['quiz_id'];
		      $sid=$_SESSION['id'];
		      $findmax=mysqli_query($con,"select MAX(q_order) as maxorder from question_order where quiz_id='$quiz_id' and member_id='$sid'")or die(mysqli_error($con));
			    $rowmax=mysqli_fetch_array($findmax);
			    
			    $question_id=$_SESSION['question_id'];
			    if (isset($_REQUEST['qid']))
				{$question_id=$_REQUEST['qid'];}
			    
			    $query5=mysqli_query($con,"select * from question natural join question_order where quiz_id='$quiz_id' and question_id='$question_id'")or die(mysqli_error($con));
			    $row5=mysqli_fetch_array($query5);
			    
			    if (($row5['q_order'])<($rowmax['maxorder']))
			    {
			      echo "<button type='submit' name='finish' id='finish' class='btn-lg btn-warning pull-right'><i class='glyphicon glyphicon-log-out'></i>Finish</button>";	    
			      echo "<button type='submit' name='next' class='btn-lg btn-primary pull-right'><i class='glyphicon glyphicon-forward'></i>Next</button>";
			      
			    }
			    else
			    {
			       echo "<button type='submit' name='finish' id='finish' class='btn-lg btn-primary pull-right'><i class='glyphicon glyphicon-log-out'></i>Submit & Finish</button>";
			    }
		    ?>
									</div>
								</div>
							</div>
						</div>
					 </div>	


					</div><!--col-md-12-->
				</div><!--col-md-12-->
			</div><!--page-content-->
		</div><!--page-container-->
	</div><!--container-->
 </body>	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../dist/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dist/js/bootstrap.min.js"></script>
	
    <script>
    
 	window.onload=function(){ 
    window.setTimeout(function() { document.finish1.submit(); },<?php echo $timer;?>);}
    
    </script>
	
<script type="text/javascript">
    function count() {
 
    var startTime = document.getElementById('hms').innerHTML;
    var pieces = startTime.split(":");
    var time = new Date();    
	time.setHours(pieces[0]);
    time.setMinutes(pieces[1]);
    time.setSeconds(pieces[2]);
    var timedif = new Date(time.valueOf() - 1000);
    var newtime = timedif.toTimeString().split(" ")[0];
    document.getElementById('hms').innerHTML=newtime;
    setTimeout(count, 1000);
}
count();
 
</script>
    <script>
    function disable_f5(e)
{
  if ((e.which || e.keyCode) == 116)
  {
      e.preventDefault();
  }
}

$(document).ready(function(){
    $(document).bind("keydown", disable_f5);    
});

    
   
    
    </script>
     <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
	
  </body>
</html> 
