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
							<div class="col-md-12">
								<!-- BEGIN PORTLET -->
							<form name="question" method="post" action="question_save.php">
				
								<div class="portlet">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Quiz Title: 
<?php
				    include('../includes/dbcon.php');
				    
				    $qid=$_REQUEST['qid'];
				    $query=mysqli_query($con,"select * from quiz where quiz_id='$qid'")or die(mysqli_error($con));
				    	$row=mysqli_fetch_array($query);
					    echo $row['quiz_title'];

				  ?>
											</span>
										</div><a href="quiz.php" class="btn btn-primary pull-right">Done</a>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
				
													<input type="hidden" value="<?php echo $_REQUEST['qid'];?>" name="qid">
													<h3>Add New Question</h3>
													<textarea class="textarea" name="question" id="question" placeholder="Enter Question or Instruction here(for matching type)" style="width: 100%; height:100px" required></textarea>
													<div class="row">
														<div class="col-md-6">
													  <select class="form-control" placeholder="Enter ..." name="type" id="type" required>
														  <option value="">Type of Question</option>
														  <option value="Multiple Choice">Multiple Choice</option>
														  <option value="True or False">True or False</option>
														  <option value="Modified True or False">Modified True or False</option>
														  <option value="Identification">Identification</option>
													  </select>
													</div>
													<div class="col-md-4">
													  <label class="pull-left">Points: </label> 
													  <div class="input-group">
													    <input type="number" class="form-control" name="pts" required>
													    
													  </div> 
													</div>
													<div class="col-md-2">
													  <button class="btn btn-primary">Save</button>
													</div><br>
												</div>
													<div class="row">
														<div class="col-md-8">
														<label class="control-label" for="inputEmail"></label>
															<div class="controls">			
																<div id="multiple" class="col-md-8">
																		<label class="pull-left">A: </label> <div class="input-group">
																		<input type="text" class="form-control" name="mtext[]">
																		<span class="input-group-addon">
																			<div class="iradio_minimal checked" aria-checked="true" aria-disabled="false">
																				<input type="radio" name="mchoice" value="A">
																				<input type="hidden" name="letter[]" value="A">
																			</div>
																		</span>
																		</div> 
																		<label class="pull-left">B: </label> <div class="input-group">
																		<input type="text" class="form-control" name="mtext[]">
																		<span class="input-group-addon">
																			<div class="iradio_minimal checked" aria-checked="true" aria-disabled="false">
																				<input type="radio" name="mchoice" value="B">
																				<input type="hidden" name="letter[]" value="B">
																			</div>
																		</span>
																		</div> 
																		<label class="pull-left">C: </label> <div class="input-group">
																		<input type="text" class="form-control" name="mtext[]">
																		<span class="input-group-addon">
																			<div class="iradio_minimal checked" aria-checked="true" aria-disabled="false">
																				<input type="radio" name="mchoice" value="C">
																				<input type="hidden" name="letter[]" value="C">
																			</div>
																		</span>
																		</div> 
																		<label class="pull-left">D: </label> <div class="input-group">
																		<input type="text" class="form-control" name="mtext[]">
																		<span class="input-group-addon">
																			<div class="iradio_minimal checked" aria-checked="true" aria-disabled="false">
																				<input type="radio" name="mchoice" value="D">
																				<input type="hidden" name="letter[]" value="D">
																			</div>
																		</span>
																		</div> 	
																		
																</div>
																</div><br><br>
																<div id="tf" class="row">
																	<div class="col-md-4">
																		<div class="radio">
																			<label class="">
																			<input type="radio" name="tf" id="optionsRadios1" value="True" checked >
																			True
																			</label>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="radio">
																			<label class="">
																			<input type="radio" name="tf" id="optionsRadios1" value="False">
																			False
																			</label>
																		</div>
																		
																	</div>
																</div><br><br>
																<div id="mtf" class="row">
																	<div class="col-md-4">
																		<label class="">
																		  <input type="radio" name="mtf" id="optionsRadios1" value="True" checked="" >
																		  True
																		</label>
																	</div>
																	<div class="col-md-12">
																		<label class="">
																		  <input type="radio" name="mtf" id="optionsRadios1" value="False" checked="" >
																		  Write Correct Answer if False
																		  <input type="text" class="form-control" name="answermtf">
																		</label>
																	</div>
																</div>
																
																<div id="identification" class="row">
																	<div class="col-md-12">
																	<input name="answer1" class="form-control" type="text" placeholder="Write correct answer here...">
																	</div>
																</div><br>
																<div id="enumeration" class="col-md-4">
																	<input type="text" class="form-control" name="answer[]">
																	<input type="text" class="form-control" name="answer[]">
																	<input type="text" class="form-control" name="answer[]">
																	<input type="text" class="form-control" name="answer[]">
																	<input type="text" class="form-control" name="answer[]">
																	<button id="addfield">Add</button><br>
																</div>
																
																<div id="mt" class="row">
																	<div class="col-md-2">
																		Answer
																		
																		<input type="text" class="form-control" name="answer2[]">
																		<input type="text" class="form-control" name="answer2[]">
																		<input type="text" class="form-control" name="answer2[]">
																		<input type="text" class="form-control" name="answer2[]">
																		<input type="text" class="form-control" name="answer2[]">
																	</div>
																	<div class="col-md-4">
																		Column A
																		<input type="text" class="form-control" name="question1[]">
																		<input type="text" class="form-control" name="question1[]">
																		<input type="text" class="form-control" name="question1[]">
																		<input type="text" class="form-control" name="question1[]">
																		<input type="text" class="form-control" name="question1[]">
																	</div>
																	<div class="col-md-2">
																		Choices
																		<input type="text" class="form-control" value="A" name="letter1[]" readonly>
																		<input type="text" class="form-control" value="B" name="letter1[]" readonly>
																		<input type="text" class="form-control" value="C" name="letter1[]" readonly>
																		<input type="text" class="form-control" value="D" name="letter1[]" readonly>
																		<input type="text" class="form-control" value="E" name="letter1[]" readonly>
																
																	</div>
																	<div class="col-md-4">
																		Column B
																		<input type="text" class="form-control" name="choice1[]">
																		<input type="text" class="form-control" name="choice1[]">
																		<input type="text" class="form-control" name="choice1[]">
																		<input type="text" class="form-control" name="choice1[]">
																		<input type="text" class="form-control" name="choice1[]">
																	</div>
																	<div class="col-md-4">
																	<button id="addmt" onClick="addInput('mt');">Add</button>
																	</div>
																</div>
															</div>
															
													</div>
													
													
												</form>
												</div>
												<!-- BEGIN PORTLET -->
												<div class="portlet box blue">
												<div class="portlet-body">
													<?php
		
		//$qid=$_REQUEST['qid'];
		$query=mysqli_query($con,"select * from question natural join answer where quiz_id='$qid' group by question_id")or die(mysqli_error($con));
		$quizcount=mysqli_num_rows($query);
		if ($quizcount<1)echo "<h3 class='text-red'>No Available Question!</h3>";
		else {
		echo "
		<table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
						<th>Item</th>
                        <th>Type</th>
                        <th>Question</th>
                        <th>Points</th>
						<th>Choices</th>
						<th>Correct</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>";
                    ?>
<?php
		
		$i=1;
		$total=0;
		while ($row=mysqli_fetch_array($query)){
			$question_id=$row['question_id'];

?>

<div id="delquestion<?php echo $question_id;?>" class="modal fade in col-md-12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;height:200px">
  <div class="modal-dialog">
    <div class="modal-content">
         <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete Question</h4>
         </div>
	 <div class="modal-body">
	    <form class="form-horizontal" method="post" action="question_del.php">
		<!-- Title -->
		<input type="hidden" name="qid" value="<?php echo $qid;?>">
		<input type="hidden" name="question_id" value="<?php echo $question_id;?>">
                <div class="form-group">
		  <p>Are you sure you want to delete this?</p>
                </div> 
               
	</div> <!--end of modal body-->
        <div class="modal-footer col-md-10">
	    	<button type="submit" name="delete" class="btn btn-primary">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">No</button>
        </div>
       </form><br><br><br>
    </div><!--end of modal content-->
            
  </div><!--end of modal dialog-->
 </div><!--end of modal-->
 
                      <tr>
						<td><?php echo $i++;?></td>
                        <td><?php echo $row['question_type'];?></td>
                        <?php
			    
			    
					echo "<td>";	
					echo $row['question']."<br> ".$row['cola'];
					echo "</td>";	

					echo "<td>";	
					echo $row['points'];
					echo "</td>";	
					echo "<td>";	
$cola=mysqli_query($con,"select * from answer  where question_id='$question_id'")or die(mysqli_error($con));	
					
					while ($rowcola=mysqli_fetch_array($cola)){					
					echo $rowcola['letter']." ". $rowcola['choices']."<br>";}
					echo "</td>";	
					echo "<td>";	
					echo $row['answer'];
					echo "</td>";	
				
			    	
			    ?>
			
             
			
                        <td><a class="btn btn-warning" href="question_update.php?question_id=<?php echo $question_id;?>&qid=<?php echo $qid;?>" data-toggle="tooltip" data-original-title="Update Questions"><i class="glyphicon glyphicon-pencil"> </i></a>
			<a data-target="#delquestion<?php echo $question_id;?>" data-toggle="modal" data-original-title="Delete Question" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>				
						</td>
                      </tr>
                      
<?php 
$total=$total+$row['points'];
}?>                     
                    </tbody>
            			<?php
                   echo "
                   <tfoot>
                      <tr>
                        <th colspan='3'>Total Points</th>
						<th>$total</th>
						<th></th>
						<th></th>
						
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>";}?>
												</div>
											</div>
											<!-- END EXAMPLE TABLE PORTLET-->
														<!-- END PORTLET -->	
											</div>
											
										</div>
										<!--END TABS-->
									</div>
								</div>
								<!-- END PORTLET -->
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
        
    });   
</script>
<script>
	jQuery(document).ready(function(){
		jQuery("#multiple").hide();
		jQuery("#tf").hide();
		jQuery("#mtf").hide();	
		jQuery("#mt").hide();	
		jQuery("#identification").hide();	
		jQuery("#enumeration").hide();			

		jQuery("#type").change(function(){	
			var x = jQuery(this).val();			
			if(x == 'Multiple Choice') {
				jQuery("#multiple").show();
				jQuery("#tf").hide();
				jQuery("#mtf").hide();
				jQuery("#mt").hide();
				jQuery("#identification").hide();
				jQuery("#enumeration").hide();
			} else if(x == 'True or False') {
				jQuery("#multiple").hide();
				jQuery("#tf").show();
				jQuery("#mtf").hide();
				jQuery("#mt").hide();
				jQuery("#identification").hide();
				jQuery("#enumeration").hide();
			} 
			else if(x == 'Modified True or False') {
				jQuery("#multiple").hide();
				jQuery("#tf").hide();
				jQuery("#mtf").show();
				jQuery("#mt").hide();
				jQuery("#identification").hide();
				jQuery("#enumeration").hide();
			}
			else if(x == 'Matching Type') {
				jQuery("textarea[name='question']").val();
				jQuery("#multiple").hide();
				jQuery("#tf").hide();
				jQuery("#mtf").hide();
				jQuery("#mt").show();
				jQuery("#identification").hide();
				jQuery("#enumeration").hide();
			}
			else if(x == 'Identification') {
				jQuery("#multiple").hide();
				jQuery("#tf").hide();
				jQuery("#mtf").hide();
				jQuery("#mt").hide();
				jQuery("#identification").show();
				jQuery("#enumeration").hide();
			}
			else if(x == 'Enumeration') {
				
				jQuery("#multiple").hide();
				jQuery("#tf").hide();
				jQuery("#mtf").hide();
				jQuery("#mt").hide();
				jQuery("#identification").hide();
				jQuery("#enumeration").show();
			}else {
				jQuery("#multiple").hide();
				jQuery("#tf").hide();
				jQuery("#mtf").hide();
				jQuery("#mt").hide();
				jQuery("#identification").hide();
				jQuery("#enumeration").hide();
			}
		});
		
	});
</script>
<script type="text/javascript">
           function createPetField() {
	      var input = document.createElement('input');
	      input.type = 'text';
	      input.name = 'answer[]';
	      input.class='form-control';
	      input.style.height = "33px";
	      input.style.width = "318px";
	      return input;
	    }

	    var form = document.getElementById('enumeration');
	    document.getElementById('addfield').addEventListener('click', function(e) {
	      form.appendChild(createPetField());
	    });
        </script>
<script>
var counter = 1;
var limit = 2;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + 10 + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = " <div class='col-md-2'><input type='text' class='form-control' name='answer2[]'><input type='text' class='form-control' name='answer2[]'><input type='text' class='form-control' name='answer2[]'><input type='text' class='form-control' name='answer2[]'><input type='text' class='form-control' name='answer2[]'></div><div class='col-md-4'><input type='text' class='form-control' name='question1[]'><input type='text' class='form-control' name='question1[]'><input type='text' class='form-control' name='question1[]'><input type='text' class='form-control' name='question1[]'><input type='text' class='form-control' name='question1[]'></div><div class='col-md-1'><input type='text' class='form-control' value='F' name='letter1[]' readonly><input type='text' class='form-control' value='G' name='letter1[]' readonly><input type='text' class='form-control' value='H' name='letter1[]' readonly><input type='text' class='form-control' value='I' name='letter1[]' readonly><input type='text' class='form-control' value='J' name='letter1[]' readonly></div><div class='col-md-4'><input type='text' class='form-control' name='choice1[]'><input type='text' class='form-control' name='choice1[]'><input type='text' class='form-control' name='choice1[]'><input type='text' class='form-control' name='choice1[]'><input type='text' class='form-control' name='choice1[]'></div>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>
</body>
<!-- END BODY -->
</html> 	