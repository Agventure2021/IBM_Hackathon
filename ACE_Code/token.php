<?php

function token($adhar){
    $dynamicstring = strval($adhar) ;
    $sub = substr($dynamicstring, -4);
    // $token = bin2hex(random_bytes(1));
    $token = random_int(10, 99);
    return $token."".$sub;
}

$fname = 'SSS';
$adhar = 297407737375;
$date = '16/6/2021';
$time = '17:00';
$location = 'Gwalior';

$result = token($adhar);

echo "Dear $fname, Your crop selling slot is booked for $date $time at $location, Your six digit token no. is $result."

?>