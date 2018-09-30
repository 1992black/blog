<?php
$commit = $_POST['commit'];
echo $_SERVER['HTTP_HOST'];
if ($commit) {
    commit();
}
else {
    echo ' test';
}
?>

<?php
function commit() {
    #echo $_POST['txt'];
    file_put_contents ( 'test.txt' , $_POST['txt'] );
    $filename='test.txt'; //ÎÄ¼þÃû
    $date=date("Ymd-H:i:m");
    Header( "Content-type:  application/octet-stream "); 
    Header( "Accept-Ranges:  bytes "); 
    Header( "Accept-Length: " .filesize($filename));
    header( "Content-Disposition:  attachment;  filename= {$date}.txt"); 
    //echo file_get_contents($filename);
    readfile($filename); 
}
?>
