<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'dmsgk0302', 'mydb') or die('Database Connect Fail!!');

$boardIdx = $_GET['boardIdx'];
$boardTitle = $_GET['boardTitle'];
$boardDetail = $_GET['boardDetail'];

if (!isset($_FILES['uploadFile']) || $_FILES['uploadFile']['error'] === 4) {
    // No file uploaded or file input not provided, handle this case accordingly
    $fileName = '';
    $upAddr = '';
} else {
    // File was uploaded, process the file
    $upError = $_FILES['uploadFile']['error'];
    $fileName = $_FILES['uploadFile']['name'];
    $fileTmp = $_FILES['uploadFile']['tmp_name'];
    $upAddr = "./Upload/" . $fileName;

    if ($upError != UPLOAD_ERR_OK && $upError != 4) {
        switch ($upError) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "
                    <script>
                        alert(\"파일 사이즈가 초과되었습니다!!!\");
                        history.back();
                    </script>
                ";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "
                    <script>
                        alert(\"파일이 제대로 업로드 되지 않았습니다!!!\");
                        history.back();
                    </script>
                ";
                break;
        }
        exit;
    }

    move_uploaded_file($fileTmp, $upAddr);
}

$sql = "UPDATE userBoardtb SET boardTitle = '$boardTitle', boardDetail = '$boardDetail', boardFile = '$fileName' WHERE boardIdx = '$boardIdx';";
$result = mysqli_query($connect, $sql);

if ($result) {
    echo "
        <script>
            alert(\"게시글이 수정되었습니다!!!\");
            location.href = \"./boardIndex.php\";
        </script>
    ";
} else {
    echo "
        <script>
            alert(\"게시글 수정에 실패했습니다!!!\");
            history.back();
        </script>
    ";
}
?>
