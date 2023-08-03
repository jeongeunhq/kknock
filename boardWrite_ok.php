<?php
#error_reporting( E_ALL );
#ini_set( "display_errors", 1 );

session_start();
include('./connect.php');

if (!isset($_SESSION['sId']) || !isset($_SESSION['sIdx'])) {
    header('Location:./index.html');
    exit;
}

$uId = $_SESSION['sId'];
$bTitle = $_GET['boardTitle'];
$bDetail = $_GET['boardDetail'];
$bDate = date('Y-m-d H:i:s');

$file = null; // Default value for $file if no file is uploaded
$fName = ''; // Default value for $fName if no file is uploaded
$fSize = 0; // Default value for $fSize if no file is uploaded (set to zero)
$fType = ''; // Default value for $fType if no file is uploaded

if (isset($_FILES['uploadFile'])) {
    $upError = $_FILES['uploadFile']['error'];
    $fName = $_FILES['uploadFile']['name'];
    $fTmp = $_FILES['uploadFile']['tmp_name'];
    $fSize = $_FILES['uploadFile']['size'];
    $fType = $_FILES['uploadFile']['type'];

    if ($upError == UPLOAD_ERR_OK) {
        $file = base64_encode(file_get_contents($fTmp)); // base64 Encoding
    } else {
        // Handle file upload error
        echo "
            <script>
                alert(\"파일 업로드 오류가 발생했습니다!!!\");
                history.back();
            </script>
        ";
        exit;
    }
}

if (empty($bTitle) || empty($bDetail)) {
    echo "
        <script>
            alert(\"게시글이 올라가지 못했습니다!!!\");
            history.back();
        </script>
    ";
    exit;
}

$sql = "INSERT INTO userBoardtb
        (userId, boardTitle, boardDetail, boardDate, fileContents, fileName, fileSize, fileType)
        VALUES('$uId', '$bTitle', '$bDetail', '$bDate', '$file', '$fName', $fSize, '$fType');";

$rst = mysqli_query($con, $sql);

if ($rst) {
    echo "
        <script>
            alert(\"게시글이 올라갔습니다!!!\");
            location.href = \"./boardIndex.php\";
        </script>
    ";
} else {
    echo "
        <script>
            alert(\"게시글이 올라가지 못했습니다!!!\");
            history.back();
        </script>
    ";
    exit;
}
?>

