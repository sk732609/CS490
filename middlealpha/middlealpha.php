<?php
$connection = curl_init();
$capture = file_get_contents("php://input");
curl_setopt($connection, CURLOPT_URL, "https://afsaccess4.njit.edu/~rv356/CS490alpha/plzwork.php");
curl_setopt($connection, CURLOPT_RETURNTRANSFER , true);
curl_setopt($connection, CURLOPT_POST, true);
curl_setopt($connection, CURLOPT_POSTFIELDS, $capture);
curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$designation = curl_exec($connection);
curl_close($connection);
if ($designation == "fail") {
  echo json_encode($designation);
}
else if ($designation == "professor") {  
  echo json_encode($designation);
}
else if ($designation == "student") { 
  echo json_encode($designation);
}

?>
