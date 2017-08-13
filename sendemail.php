<?php 

    include('includes/dbcon.php');

    $email=$_POST['email'];

    $query=mysqli_query($con,"SELECT * from member where email='$email'")or die(mysqli_error($con));

         $num_rows = mysqli_num_rows($query);

         if ($num_rows==0)
         {  
            echo "<script type='text/javascript'>alert('Sorry! Email not found!');</script>";
            echo "<script>document.location='index.php';window.history.back();</script>";
         }
         else
         {
             ini_set( 'display_errors', 1 );
    
            error_reporting( E_ALL );
            
            $from = "info@onlineassessment.com";
            
            $to = "$email";
            
            $subject = "Password Recovery";
            
            $message = "You received this email because you requested to reset your account password for the email $email. To reset your password, click the link to change password. <a href='localhost/online_assessment/reset.php?email=$email'


            Thanks,

            Online Assessment System
                
            ";
            
            $headers = "From:" . $from;
            
            mail($to,$subject,$message, $headers);

             mysqli_query($con,"UPDATE member SET reset_status='1' where email='$email'")or die(mysqli_error($con)); 

            echo "<script type='text/javascript'>alert('Email sent! Please check your email on how to reset your password');</script>";
            echo "<script>document.location='index.php'</script>";
         }
   
?>    