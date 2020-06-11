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
wh_log("DB CONNECT");
$docType = $_POST['doctype'];
$expDate = $_POST['expdate'];
$titolare = $_POST['titolare'];
$remem = $_POST['remember'];
$IDtable = $_POST['idut'];
wh_log("POSTED DATA:");
wh_log($docType);
wh_log($expDate);
wh_log($titolare);
wh_log($remem);
wh_log($IDtable);
$res = "INSERT INTO myDoc$IDtable ( docType, expDate, titolare, remember) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($res);
$stmt->bind_param("ssss", $docType, $expDate, $titolare, $remem);
wh_log("READY FOR QUERY");
$stmt->execute();
wh_log("EXECUTE");
$conn->close();
wh_log("************** END Log For Day : '" . $log_time . "'**********");


function wh_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) 
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/logINSDOC_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
} 
