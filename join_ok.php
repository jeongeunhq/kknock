<?php
$connect = mysqli_connect('localhost', 'root', 'dmsgk0302', 'mydb') or die('Database Connect Fail!!!!');

$userName = $_GET['userName'];
$userId = $_GET['userId'];
$userPw = $_GET['userPw'];
$userPhone = $_GET['userPhone'];
$userEmail = $_GET['userEmail'];
$userDate = date('Y-m-d H:i:s');

$sql = "SELECT * FROM usertb WHERE userId='$userId';";
$result = $connect->query($sql);
$id = mysqli_num_rows($result);

if ($id > 0) {
    echo "
        <script>
            alert(\"This ID is already taken!!\");
            history.back();
        </script>
    ";
    exit;
}

$query = "INSERT INTO usertb (userId, userPw, userName, userPhone, userEmail, userDate)
        VALUES ('$userId', '$userPw', '$userName', '$userPhone', '$userEmail', '$userDate')";

$result = $connect->query($query);

if($result){
    echo "
        <script>
            alert(\"Member registration complete!!\");
            location.href = \"./index.html\";
        </script>
    ";
} else {
    echo "
        <script>
            alert(\"Member registration Fail!!!\");
            history.back();
        </script>
    ";
    exit;
}
?>

