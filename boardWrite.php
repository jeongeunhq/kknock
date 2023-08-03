<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/boardWrite.css">
</head>
<body>
    <header>
        <a href="main.php" id="logo">Euna</a>
        <nav>
            <ul>
                <li><a href="boardIndex.php">Board</a></li>
                <li><a href="index.html">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="wrap" id="write_wrap">
        <section>
            <h1>게시글 쓰기</h1>
            <form action="boardWrite_ok.php" method="get" enctype="multipart/form-data">
                <section id="board_write">
                    <div >
                        <label for="boardTitle">제목</label>
                        <p><input type="text" name="boardTitle" id="board_title" ></p>
                    </div>
                    <div>
                        <label for="boardDetail">내용</label>
                        <p><textarea name="boardDetail" id="board_detail" ></textarea></p>
                    </div>
                    <div>
                        <label for="boardFile">파일</label>
                        <p><input type="file" name="uploadFile" id="uploadFile" accept="image/*, .pdf"/></p>
                    </div>
                </section>
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
