<?php
include "DB.php";

  $str_json = file_get_contents('php://input');
	$response = json_decode($str_json, true); // decoding received JSON to array

	$UCID="none";$Password="none";

	if(isset($response['UCID'])) $UCID = $response['UCID'];
	if(isset($response['Password'])) $Password = $response['Password'];
//$UCID =
//$Password =


// if there is a user name in the sql hash the
//passowrd from the sql then compare
$sql="SELECT * from UserCS490 where Username like '$UCID' and Password like '$Password'";
$query = $DB->query($sql);
$result=$query->fetchAll();

// SELECT `Role` FROM UserCS490 WHERE `Username`='sk2662'
if ($result == true){
    
    $sql1="SELECT `Role` FROM UserCS490 WHERE `Username`=`$UCID`";
    $array = Array (
    "login" => Array (
        "UCID" => "$UCID",
        "Password" => "$Password",
        "role" => "$sql1"
    )
);
    $query1 = $DB->query($sql1);
    $result1=$query1->fetchAll();
    echo "WELCOME". $result1;
}else{
    echo "Not Acceptable";
}

$ch = curl_init();
$url = "https://afsaccess4.njit.edu/~sk2662/CS490Alpha/testmiddle.php";
$data = file_get_contents('php://input');



/*
<?php
//Connect to database
include "DB.php";
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
 $str_json = file_get_contents('php://input');
	$response = json_decode($str_json, true); // decoding received JSON to array
//Build query
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM UserCS490 WHERE Username='$username' AND Password='$password'";

//Build response
$result = mysqli_query($db,$query);
$response = array(
	"Username" => (mysqli_num_rows($result) == 1)
	);
$db->close();

//Return response

header("Content-Type:application/json");
echo json_encode($response);


?>
*/

?>

