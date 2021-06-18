<?php
require('database.php');
$db= $conn; // assign  your connection varibale

$login=$usrname=$password='';

 extract($_POST);
if(isset($_POST['login'])) {


$usrname= trim($_POST['usrname']); // storing the phone number
$password = trim($_POST['pwd']); // Storing password
}
if(empty($password) && empty($usrname))
{
echo "All fields are compulsory"
}
// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
    echo 'Strong password.';
}

?>
