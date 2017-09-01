<?php include('session.php');

	$type = $_POST['type'];
	$question = $_POST['question'];
	$pts = $_POST['pts'];
	$quiz =$_POST['qid'];
	
	if ($type=="Multiple Choice")
	{
		
		$answer = $_POST['mchoice'];
		$text = $_POST['mtext'];
		$letter = $_POST['letter'];
		
		mysqli_query($con,"INSERT INTO question(quiz_id,question,question_type,points) VALUES('$quiz','$question','$type','$pts')")or die(mysqli_error($con));  
		$i=0;
		$id = mysqli_insert_id($con);
		foreach($text as $choice) { 
			mysqli_query($con,"INSERT INTO answer(question_id,choices,answer,letter) VALUES('$id','$choice','$answer','$letter[$i]')")or die(mysqli_error($con));
			$i++;
		}
		
	}
	if ($type=="True or False")
	{
		$answer = $_POST['tf'];
		mysqli_query($con,"INSERT INTO question(quiz_id,question,question_type,points) VALUES('$quiz','$question','$type','$pts')")or die(mysqli_error($con));  
		$i=0;
		$id = mysqli_insert_id($con);
		mysqli_query($con,"INSERT INTO answer(question_id,choices,answer) VALUES('$id','True','$answer')")or die(mysqli_error($con));
		mysqli_query($con,"INSERT INTO answer(question_id,choices,answer) VALUES('$id','False','$answer')")or die(mysqli_error($con));

	
	}
	if ($type=="Modified True or False")
	{
		$answer = $_POST['mtf'];
		
		mysqli_query($con,"INSERT INTO question(quiz_id,question,question_type,points) VALUES('$quiz','$question','$type','$pts')")or die(mysqli_error($con));  
		$i=0;
		$id = mysqli_insert_id($con);
		if ($answer=="True")
		{
		  mysqli_query($con,"INSERT INTO answer(question_id,answer) VALUES('$id','$answer')")or die(mysqli_error($con));
		}
		else{
		  $answer1 = $_POST['answermtf'];
		  mysqli_query($con,"INSERT INTO answer(question_id,answer) VALUES('$id','$answer1')")or die(mysqli_error($con));
		  }
		 
	}
	if ($type=="Identification")
	{
		$answer1 = $_POST['answer1'];
		mysqli_query($con,"INSERT INTO question(quiz_id,question,question_type,points) VALUES('$quiz','$question','$type','$pts')")or die(mysqli_error($con));  
		
		$id = mysqli_insert_id($con);
		mysqli_query($con,"INSERT INTO answer(question_id,answer,choices) VALUES('$id','$answer1','')")or die(mysqli_error($con));
		
		
	}
	if ($type=="Enumeration")
	{
		
		$answer = $_POST['answer'];
		
		$i=0;
		foreach($answer as $choice1) { 
			if ($choice1<>"")
			{
				mysqli_query($con,"INSERT INTO question(quiz_id,question,question_type,points) VALUES('$quiz','$question','$type','$pts')")or die(mysqli_error($con)); 

					$id = mysqli_insert_id($con);
					$total=$pts*$i;
					mysqli_query($con,"INSERT INTO answer(question_id,answer) VALUES('$id','$choice1')")or die(mysqli_error($con));

				
					$i++;
			}
		}
	}
	if ($type=="Matching Type")
	{
	
		$question1 = $_POST['question1'];
		$letter1 = $_POST['letter1'];
		$choice1 = $_POST['choice1'];
		$answer2 = $_POST['answer2'];
		$question = $_POST['question'];
		
		
		$ii=0;
		foreach($question1 as $q)
		  {
		   
		    $l = $letter1[$ii];
		    $c = $choice1[$ii];
		    $a = $answer2[$ii];
		    
			mysqli_query($con,"INSERT INTO question(quiz_id,question,question_type,points) VALUES('$quiz','$question','$type','$pts')")or die(mysqli_error($con));  

		
		$id = mysqli_insert_id($con);    

		    mysqli_query($con,"INSERT INTO answer(question_id,letter,choices,cola,answer) VALUES('$id','$l','$c','$q','$a')")or die(mysqli_error($con));
			$ii++;
			
		  }
		
		
	}
	

	echo "<script type='text/javascript'>alert('Successfully added new question!');</script>";
	echo "<script>document.location='create_quiz.php?qid=$quiz'</script>";   	
	
?>