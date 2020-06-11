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
$pic = $_POST['image'];
$picTh = $_POST['imageth'];
$docID = $_POST['docid'];
$IDut = $_POST['idut'];
wh_log("POSTED DATA:");
wh_log($docID);
$res = "INSERT INTO myPics$IDut (docID, pic, picTh) VALUES (?, ?, ?)";
$stmt = $conn->prepare($res);
$stmt->bind_param("sss", $docID, $pic, $picTh);
wh_log("READY FOR QUERY");
$stmt->execute();
$conn->close();
wh_log("************** END Log For Day : '" . $log_time . "'**********");

function wh_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) 
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
} 
