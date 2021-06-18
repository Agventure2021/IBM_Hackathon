<?php
include 'db_connection.php';
if(isset($_POST['submit']))
{
	$username= check($_POST['username']);
	$contact= check($_POST['contact']);
    $aadhar= check($_POST['aadhar']);
    $pincode= check($_POST['pincode']);
	$password= check($_POST['password']);
	$hashPassword = password_hash($password,PASSWORD_DEFAULT);

 if(empty($username)||empty($contact)||empty($aadhar)||empty($pincode)||empty($password))
   {
	 header("location:signup.php?error=All the field are required");
   }
 else
     {
      	$expression = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
        if(!preg_match($expression,$password))
        {
            header("location:signup.php?error=password must be alphanumeric with minimum 8 characters");
         }
         else
         {
 			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
 			{
      			header("location:signup.php?error=EMAIL NOT VALID");
			}
			else
	        {
		   		$usernameCheck = "SELECT * from usertable WHERE username='$username'"; //usertable refers to farmer registration database.
		   		$result = mysqli_query($conn,$usernameCheck);
				if(mysqli_num_rows($result)>0)
		        {
					header("location:signup.php?error=User already exists");
			 	}
			 	else
                {
                	$sql = "INSERT into usertable (`username`,`contact`,`aadhar`,`pincode`,`password`) VALUES ('$username','$contact','$aadhar','$pincode','$hashPassword');";
			 	    if(!mysqli_query($conn,$sql))
			 	     {
			 	 	 	header("location:signup.php?error=Signup Error");
			 	 	 }
			 	     else
			 	     {
			 	 	 	header("location:signup.php?error=Signup success");
			 	 	 }
			    }
            }
           }
         }
      }
  }
else
 {
    header("location:signup.php");
 }
function check($data)
{
	$data= trim($data);
	$data= stripslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
?>
