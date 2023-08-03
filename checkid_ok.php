<?php
include('connect.php');

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // 데이터베이스에서 해당 아이디로 사용자를 조회하여 중복 체크
    $sql = "SELECT * FROM `usertb` WHERE `userId` = '$userId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 중복된 아이디가 존재함
        echo "X";
    } else {
        // 중복된 아이디가 존재하지 않음
        echo "O";
    }
} else {
    // 아이디 파라미터가 전달되지 않았을 경우 오류 응답
    echo "Error: Missing 'userId' parameter.";
}

$conn->close();
?>
