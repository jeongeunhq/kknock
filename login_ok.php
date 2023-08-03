<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'dmsgk0302', 'mydb') or die('Database Connect Fail!!');

$userId = $_GET['userId'];
$userPw = $_GET['userPw'];

$sql = "SELECT * FROM usertb WHERE userId='$userId';";
$result = $connect->query($sql); 

$id = mysqli_num_rows($result);

if (!$id) {
    echo "
        <script>
            alert(\"ID and password do not match!!\");
            history.back();
        </script>
    ";
    exit;
} else {
    $user = mysqli_fetch_array($result); 
    $password = $user['userPw'];

    // 패스워드 검증 - 평문 비밀번호와 데이터베이스에 저장된 비밀번호를 비교
    if ($userPw != $password) {
        echo "
            <script>
                alert(\"ID and password do not match!!\");
                history.back();
            </script>
        ";
        exit;
    } else {
        $_SESSION['sIdx'] = $user['userIdx'];
        $_SESSION['sId'] = $user['userId'];
        $_SESSION['sName'] = $user['userName'];
        $_SESSION['sEmail'] = $user['userEmail'];
        $_SESSION['sDate'] = $user['userDate'];

        mysqli_close($connect);
        echo "
            <script>
                location.href = \"./main.php\";
            </script>
        ";
    }
}
?>
