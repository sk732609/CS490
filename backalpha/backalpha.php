<?php

$host = "sql1.njit.edu";
$user = "rv356";
$dbpassword = "Superman*^8520";
$db  = "rv356";

$string = json_decode(file_get_contents("php://input"), true);
$ucid = $string["ucid"];
$password = ($string["password"]);

$conn = mysqli_connect("$host", "$user", "$dbpassword", "$db");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



$query = "SELECT * from UserCS490 where Username='$ucid' and Password='$password'";
$row = mysqli_query($conn, $query);
$elms = mysqli_fetch_array($row);

$sql1="SELECT `Role` FROM UserCS490 WHERE `Username`= '$ucid'";
$result = $conn->query($sql1);
$ans;
while ($row = $result->fetch_assoc()) {
    //echo $row['Role']."<br>";
    $ans = $row['Role'];
}
///echo "$ans";

switch ("$ans") {
  case "Professor":
  header("location: prof.html");
    echo "professor";

    break;
  case "Student":
  header("location: student.html");
    echo "student";
     
    break;
  default:
    echo "fail";
}
/*
if ("$ans" == "Professor") {
	echo "professor";
 header("location: prof.html");
}
else if ("$ans"== "Student") {
	echo "student";
 header("location: student.html");
 
}
else {
	echo "fail";
 
}
*/
exit;

?>
