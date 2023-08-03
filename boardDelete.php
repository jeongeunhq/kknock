<?php
session_start();
include('./connect.php');

$boardIdx = $_GET['idx'];

$delSql = "delete from userBoardTB where boardIdx = '$boardIdx';"; 
$delete = mysqli_query($con, $delSql);

if($delete){
    echo"
        <script>
            alert(\"Delete!!\");
        </script>
    ";
    header("Location:./boardIndex.php");
}else{
    echo" 
	<script>
            alert(\"Delete Fail!!!\");
            history.back();
        </script>
	";
   exit;
}
?>