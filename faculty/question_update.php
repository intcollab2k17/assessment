<?php include('session.php');

?>
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
							<form name="question" method="post" action="question_update_save.php">
				
								<div class="portlet">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											
<?php
				    
				    $question_id=$_REQUEST['question_id'];
				    $qid=$_REQUEST['qid'];
				    $query=mysqli_query($con,"select * from question where question_id='$question_id'")or die(mysqli_error($con));
				    	$row=mysqli_fetch_array($query);
					  //  echo $row['quiz_title'];


				  ?>
											
										</div>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
				
													<input type="hidden" value="<?php echo $qid;?>" name="qid">
													<input type="hidden" value="<?php echo $question_id;?>" name="question_id">
													<h3>Update Question</h3>
													<textarea class="textarea" name="question" id="question" placeholder="Enter Question or Instruction here(for matching type)" style="width: 100%; height:100px" required><?php echo $row['question'];?></textarea>
													<div class="row">
														<div class="col-md-6">
													  	<input type="text" class="form-control" name="type" value="<?php echo $row['question_type'];?>" readonly>
													</div>
													<div class="col-md-4">
													  <label class="pull-left">Point/s: </label> 
													  <div class="input-group">
													    <input type="number" class="form-control" name="points" value="<?php echo $row['points'];?>" required>
													    
													  </div> 
													</div>
														
													<div class="col-md-2">
													  <button class="btn btn-primary" name="update">Save</button>
													</div><br>
												</div>
												<div class="row"> 
												    <div class="col-md-12 col-xs-12">
														<div class="form-group"><br>
				  
		
              <?php
		      $query1=mysqli_query($con,"select * from answer where question_id='$question_id' order by answer_id")or die(mysqli_error($con));
		      
		      if ($row['question_type']=="Multiple Choice")
				{
				while ($row1=mysqli_fetch_array($query1)){
			    $aid=$row1['answer_id'];
			    $letter=$row1['letter'];
			    $choices=$row1['choices'];
			    $answer=$row1['answer'];
			    if ($letter<>$answer){$checked="";}
			    else $checked="checked";
			    			   
			echo "
			<div class='row'>
			<div class='col-md-6 col-xs-12'>
				<div class='col-md-1 col-xs-1'>
				    <input type='radio' name='answer' value='$letter' id='$letter' $checked>
				</div>    
				<div class='col-md-1 col-xs-1'>
				  <label for='$letter'><h4>$letter. </h4></label>
				</div>
				<div class='col-md-9 col-xs-9'>
				  <input class='form-control' type='text' value='$choices' name='choices[]'>
				  <input class='form-control' type='hidden' value='$aid' name='aid[]'>
				</div>  
			  </div>
			</div>
			";
			
			      }
			     
			}
			if ($row['question_type']=="True or False")
			{
			while ($row1=mysqli_fetch_array($query1)){
			    $choices=$row1['choices'];
			    $answer=$row1['answer'];
			    if ($choices==$answer)$checked="checked";
			    else $checked="0";
			   
			echo "
			  <div class='col-md-3 col-xs-6'>
			      	<div class='col-md-1 '>
				    <input type='radio' name='answer' value='$choices' id='$choices' $checked> 
				</div>    
				<div class='col-md-3 col-xs-6'>
				    <label for='$choices'><h3>$choices</h3></label>
				</div>    
			  </div>
			";
			      }
			}
			
			if ($row['question_type']=="Modified True or False")
			{
			  $row1=mysqli_fetch_array($query1);
			  $answer=$row1['answer'];
			    
			echo "
			  <div class='col-md-5 col-xs-12'>
			    <div class='col-md-12 col-xs-12'>
			      <label for='type'>Answer</label>
			      <input class='form-control' type='text' name='answer' value='$answer'>
			   </div>
			  </div>
			";
			}
			if ($row['question_type']=="Identification")
			{
			$row1=mysqli_fetch_array($query1);
			$answer=$row1['answer'];
			echo "
			   <div class='col-md-5 col-xs-12'>
			    <div class='col-md-12 col-xs-12'>
			      <label for='type'>Answer</label>
			      <input class='form-control' type='text' name='answer' value='$answer'>
			   </div>
			  </div>
			";
			}
			 if ($row['question_type']=="Enumeration")
			{
			while ($row1=mysqli_fetch_array($query1)){
			    $aid=$row1['answer_id'];
			    $answer=$row1['answer'];
			    
			    			   
			echo "
			<div class='col-md-6 col-xs-12'>
			    
				<div class='col-md-9 col-xs-9'>
				  <input class='form-control' type='text' value='$answer' name='answer[]'>
				  <input class='form-control' type='hidden' value='$aid' name='aid[]'>
				</div>  
			  </div>
			";
			
			      }echo "<br><br><br>";
			     
			}
			 if ($row['question_type']=="Matching Type")
			{
			while ($row=mysqli_fetch_array($query1)){
			    $aid=$row['answer_id'];
			    $answer=$row['answer'];
			    $cola=$row['cola'];
			    $letter=$row['letter'];
			    $choices=$row['choices'];
			    
			    			   
			echo "
			<div class='col-md-2'><input type='hidden' class='form-control' name='aid[]' value='$aid'><input type='text' class='form-control' name='answer2[]' value='$answer'></div><div class='col-md-4'><input type='text' class='form-control' name='cola[]' value='$cola'></div><div class='col-md-1'><input type='text' class='form-control' value='$letter' name='letter1[]' readonly></div><div class='col-md-4'><input type='text' class='form-control' name='choice1[]' value='$choices'></div>
			";
			
			      }echo "<br><br><br>";
			     
			}
			
                    ?>		
			 
			  </div><!--form group-->
			  </div><!--col-->
		     </div> 
													
													
												</form>
												</div>
												
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
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 	