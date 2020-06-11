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
$usr = $_POST['userName'];
$psw = $_POST['passw'];
$img = $_POST['img'];
wh_log("POSTED DATA:");
wh_log($usr);
wh_log($psw);
wh_log($img);
$res = "INSERT INTO myUt (userName, psw, imgUt) VALUES (?, ?, ?)";
$stmt = $conn->prepare($res);
$stmt->bind_param("sss", $usr, $psw, $img);
wh_log("READY FOR QUERY");
$stmt->execute();
wh_log("EXECUTE");
$queryes = "SELECT ID FROM myUt ORDER BY ID DESC LIMIT 1";
$resulto = $conn->query($queryes);
$rowo = $resulto->fetch_row();
$ID = $rowo[0];
wh_log("DocTable");
$mDocstruct = "CREATE TABLE myDoc$ID (
    `ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `docType` int(11) NOT NULL,
    `expDate` text DEFAULT NULL,
    `titolare` text NOT NULL,
    `remember` int(11) DEFAULT NULL
  )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
wh_log($mDocstruct);
if ($conn->query($mDocstruct) === TRUE) {
    wh_log("DOC created");
} else {
    wh_log("DOC no created: '$conn->error'");
}

$mPicStruct = "CREATE TABLE myPics$ID (
    `ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `docID` int(11) NOT NULL,
    `pic` longblob NOT NULL,
    `picTh` longblob NOT NULL
  )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($mPicStruct) === TRUE) {
    wh_log("PIC created");
    echo "EXEC";
} else {
    wh_log("PIC no created: '$conn->error'");
}
$conn->close();
wh_log("************** END Log For Day : '" . $log_time . "'**********");


function wh_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename . '/logIUSR' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}

function wh_logA($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename . '/logIUSR' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
