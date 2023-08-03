<?php
	session_start();
	$connect = mysqli_connect('localhost', 'root', 'dmsgk0302', 'mydb') or die('Database Connect Fail!!');
	
	$idx = $_GET['idx'];
	
	$sql = "select * from userBoardtb where boardIdx = '$idx';";
    $result = $connect->query($sql); 
	$bdArr = mysqli_fetch_array($result); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 수정</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/boardWrite.css">
</head>
<body>
    <header>
        <a href="index.html" id="logo">Euna</a>
        <nav>
            <ul>
                <li><a href="boardIndex.php">Board</a></li>
                <li><a href="index.html">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="wrap" id="write_wrap">
        <section>
            <h1>게시글 수정</h1>
            <form action="boardUpdate_ok.php" method="get">
                <div>
                    <label for="boardTitle">제목</label>
                    <p><input type="text" name="boardTitle" id="board_title" value="<?php echo $bdArr['boardTitle']; ?>"> 
                       <input type="hidden" name="boardIdx" value="<?php echo $bdArr['boardIdx']; ?>"> 
                    </p>
                </div>
                <div>
                    <label for="boardDetail">내용</label>
                    <p><textarea name="boardDetail" id="board_detail" ><?php echo $bdArr['boardDetail']; ?></textarea></p>
                </div>
                <div>
                    <label for="boardFile">파일</label>
                    <p><input type="file" name="uploadFile" id="uploadFile" accept="image/*, .pdf"/></p>
                </div>
                <div id="write_btn">
                    <p>
                        <a href="boardIndex.php" class="form_btn" id="can_btn">취소</a>
                    </p>
                    <p>
                        <input type="submit" value="올리기" class="form_btn"  id="sub_btn">
                    </p>
                </div>
            </form>
        </section>
    </main>
</body>
</html>