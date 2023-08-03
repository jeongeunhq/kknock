<?php
    #error_reporting( E_ALL );
  	#ini_set( "display_errors", 1 );

    session_start();
    include('./connect.php');
    
    if(!isset($_SESSION['sId']) || !isset($_SESSION['sIdx']))	header('Location:./index.html');

    
    $idx = $_GET['idx'];
    $sql = "select * from userBoardtb where boardIdx = '$idx';";
    $rst = mysqli_query($con, $sql);
    $bdArr = mysqli_fetch_array($rst);

    if(!isset($bdArr['fileContents']) || !isset($bdArr['fileName']))	header('Location:./boardWrite.php');
    
    header("Content-type:".$bdArr['fileType']."");
    header("Content-Disposition: attachment; filename=".$bdArr['fileName']."");
    header("Content-Description: File");
    header("Content-Transfer-Encoding: binary ");
    header("Expires: 0");
    header("Pragma: no-cache");
    header("Content-Length:".$bdArr['fileSize']."");
    echo base64_decode($bdArr['fileContents']);	# base64 Decoding
    
    
?>