<?php
$log_time = date('Y-m-d h:i:sa');
wh_log("************** Start Log For Day : '" . $log_time . "'**********");
$servername = "localhost";
$username = "DateAdmin";
$dbname = "myDocs";
$password = "dade00";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
wh_log("DB CONNECTED");
$docID = $_POST['docid'];
$utID = $_POST['idut'];
wh_log($docID);
$sql = "DELETE FROM myPics$utID WHERE docID = '$docID'" ;
if ($conn->query($sql) === TRUE) {
$risult = "CMPL";
} else {
wh_log("Fail: ". $conn->error);
$risult = "ERR";
}
$sql = "DELETE FROM myDoc$utID WHERE ID = '$docID'" ;
if ($conn->query($sql) === TRUE) {
$risult = "CMPL";
} else {
wh_log("Fail: ". $conn->error);
$risult = "ERR";
}
print($risult);
wh_log("************** END Log For Day : '" . $log_time . "'**********");
$conn->close();


function wh_log($log_msg)
{
$log_filename = "log";
if (!file_exists($log_filename))
{
mkdir($log_filename, 0777, true);
}
$log_file_data = $log_filename.'/logODEL_' . date('d-M-Y') . '.log';
file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
