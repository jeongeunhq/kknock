<?php
session_start();

$con = mysqli_connect('localhost', 'root', 'dmsgk0302', 'mydb') or die('Database Connect Fail!!');

if (isset($_POST['boardIdx']) && isset($_POST['name']) && isset($_POST['pw']) && isset($_POST['content'])) {
    $boardIdx = $_POST['boardIdx'];
    $name = $_POST['name'];
    $pw = $_POST['pw'];
    $content = $_POST['content'];
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO reply (con_num, name, pw, content, date) VALUES ('$boardIdx', '$name', '$pw', '$content', '$date')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: view_board.php?boardIdx=$boardIdx"); 
        exit;
    } else {
        echo "댓글 작성에 실패했습니다.";
    }
} else {
    echo "모든 필드를 입력해주세요.";
}
?>






