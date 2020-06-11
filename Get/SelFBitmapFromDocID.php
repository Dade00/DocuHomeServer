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
wh_log($docID);
$sql = "SELECT picTh FROM myPics WHERE docID = '$docID' ORDER BY ID ASC LIMIT 1" ;
$result = $conn->query($sql);if ($result->num_rows > 0){ 
    $nPic = 0;
while($row[] = $result->fetch_assoc()) {
 $json = json_encode($row,JSON_UNESCAPED_UNICODE);
 $nPic++;
 wh_log("Pic '$nPic' ");
}
} else {
    
}
print($json);
wh_log("PRINTED:");
wh_log("************** END Log For Day : '" . $log_time . "'**********");
$conn->close();


function wh_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) 
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/logAPIC_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
} 
