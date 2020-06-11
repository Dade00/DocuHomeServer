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
$IDs = $_POST['idusr'];
wh_log($IDs);
$sql = "SELECT * FROM myUt WHERE userName='$IDs'";
$result = $conn->query($sql);
wh_log($sql);
if ($result->num_rows > 0){ 
 print("Exist");
 wh_log("Exist");
} else {
    print("NotExist");
    wh_log("NotExist");
}
wh_log("PRINTED");
wh_log("************** END Log For Day : '" . $log_time . "'**********");
$conn->close();


function wh_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) 
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/logEX_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
} 
