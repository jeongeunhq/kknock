<?php
    include('./connect.php');
    
    if(isset($_GET['page']))
        $page = $_GET['page'];
    else
        $page = 1;

    $cntSql = "select * from userBoardtb;";
    $cntRst = mysqli_query($con, $cntSql); 
    $cnt = mysqli_num_rows($cntRst);
    $pagePer = 10;
    $pageIdx = ($page-1)*$pagePer + 1;
    $pageIdx -= 1;
    
    $sql = "select * from userBoardtb order by boardDate asc limit $pageIdx, $pagePer;";
    $option = $_POST['sortOption'];
	
	if($option == "sortDate"){
		$sql = "select * from userBoardtb order by boardDate desc limit $pageIdx, $pagePer;";
	}else if($option == "sortOldDate"){
		$sql = "select * from userBoardtb order by boardDate asc limit $pageIdx, $pagePer;";
	}else if($option == "sortTitle"){
		$sql = "select * from userBoardtb order by boardTitle asc limit $pageIdx, $pagePer;";
	}else if($option == "sortName"){
		$sql = "select * from userBoardtb order by userId asc limit $pageIdx, $pagePer;";
	}else if($option == "sortGood"){
		$sql = "select * from userBoardtb order by boardGood desc limit $pageIdx, $pagePer;";
	}
  
    $rst = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/shared.css">
    <link rel="stylesheet" href="./css/boardIndex.css">
    <script>
         function sortF() {
            document.getElementById('sortForm').submit();
        
      }
    </script>

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
    <main id="board_wrap" class="wrap">
        <section >
            <div id="board_header">
            	<p id="page_title">Euna 게시판</p>
            </div>

            <form method="POST" id="sortForm" action="<?php $_SERVER['PHP_SELF']; ?>">
	      <select name="sortOption" id="sort_option" onchange="sortF()">
	 	<option value=select>Select</option>
		<option value=sortDate>최신순</option>
		<option value=sortOldDate>오래된순</option>
		<option value=sortTitle>내용</option>
		<option value=sortName>작성자</option>
		<option value=sortGood>추천수</option>
	   </select>
      </form>

            <div id="board_main">
                <table id="board">
                <thead>
                    <tr>
                        <th width=100>No</th>
                        <th width=500>제목</th>
                        <th width=200>작성자</th>
                        <th width=200>작성일</th>
                        <th width=100>조회수</th>
                        <th width=100>추천수</th>
                    </tr>
                </thead>
                <?php 
                    while($arr = mysqli_fetch_array($rst)) {
                        $cmpId = $arr['userId'];
                        $idSql = "select * from usertb where userId = '$cmpId';";
                        $idRst = mysqli_query($con, $idSql);
                        $idArr = mysqli_fetch_array($idRst);
                
                ?>
                <tbody>
                    <tr align="center">
                        <td><?php echo $arr['boardIdx']; ?></td>
                        <td><a href="boardView.php?idx=<?php echo $arr['boardIdx']; ?>"><?php echo $arr['boardTitle']; ?></a></td>
                        <td><?php echo $idArr['userName']; ?></td>
                        <td><?php echo $arr['boardDate']; ?></td>
                        <td><?php echo $arr['boardViews']; ?></td>
                        <td><?php echo $arr['boardGood']; ?></td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
            </div>
            <div id="board_bottom">
                <div id="search">
                    <form method="GET" action="boardSearch.php">
                        <select name="searchOption" id="search_option" style="background-color: rgb(238,164,0 );">
                            <option value=boardTitle>제목</option>
                            <option value=boardDetail>내용</option>
                            <option value=userName>작성자</option>
                        </select>
                        <input type="text" id="search_bar" name="searchTxt" placeholder="검색 내용 입력해주세요"/>
                        <input type="submit" value="Search" id="search_btn" style="background-color: rgb(238,164,0 );"/>
                    </form> 
                </div>
                <div id="page_nums">
                <?php
                    if($page > 1){
                        $pre = $page-1;
                        echo "<a href=\"boardIndex.php?page=1\" class=\"page_str\">[처음]</a>";
                        echo "<a href=\"boardIndex.php?page=$pre\" class=\"page_str\">[이전]</a>";
                    }
                    $totalPage = ceil($cnt / $pagePer);
                    $pageNum = 1;

                    while($pageNum <= $totalPage){
                        if($pageNum == $page)
                            echo "<a href=\"boardIndex.php?page=$pageNum\" class=\"page_num\" id=\"cur_page\">$pageNum</a>";
                        else
                            echo "<a href=\"boardIndex.php?page=$pageNum\" class=\"page_num\">$pageNum</a>";
                        $pageNum++;
                    }
                    if($page < $totalPage){
                        $post = $page+1;
                        echo "<a href=\"boardIndex.php?page=$post\" class=\"page_str\">[다음]</a>";
                        echo "<a href=\"boardIndex.php?page=$totalPage\" class=\"page_str\">[끝]</a>";
                    }
                ?>
                </div>
                <div id="board_write">
                    <p><input type="button" value="글쓰기" onclick="location.href='boardWrite.php'" id="write_btn" class="form_btn"/></p>
                
                </div>
            </div>
        </section>
    </main>
</body>
</html>





