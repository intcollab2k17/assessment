<?php 

    include('includes/dbcon.php');

    $password =md5($_POST['password']);
    $email =$_POST['email'];

             mysqli_query($con,"UPDATE member SET password='$password' where email='$email'")or die(mysqli_error($con)); 

            echo "<script type='text/javascript'>alert('Password successfully changed! You may now login to your account.');</script>";
            echo "<script>document.location='index.php'</script>";
         
   
?>    