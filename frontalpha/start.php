<?php

$ucid = $_POST["ucid"];
$password = $_POST["password"];
$capture = array(
	"ucid" => $ucid,
	"password" => $password
);
$capture = json_encode($capture);

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "https://afsaccess4.njit.edu/~rv356/CS490alpha/send.php");
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture );
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
$designation = curl_exec($connection);
$designation = json_decode($designation, true);
curl_close($connection);
///echo "$designation";

if ("$designation" == "professor") {
	header("location: prof.html");
}
else if ("$designation" == "student") {
	header("location: student.html");
}
else {
	header("location: fail.html");
}

?>