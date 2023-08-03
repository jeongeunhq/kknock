<?php
session_start();
session_unset();
$host = 'localhost'; // 호스트 이름
$username = 'root'; // 사용자 이름
$password = 'dmsgk0302'; // 비밀번호
$dbname = 'mydb'; // 데이터베이스 이름

$connect = mysqli_connect($host, $username, $password, $dbname) or die("fail");
echo "
    <script>
        alert(\"Logout!!\");
        location.href = \"./index.html\";
    </script>
";
?>