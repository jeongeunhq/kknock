<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['sName'];?> Main Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/shared.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <header>
        <a href="main.php" id="logo">Euna</a>
        <nav>
            <ul>
                <li><a href="boardIndex.php">Board</a></li>
		<li><a href="#">Setting</a></li>
		<li><a href="logout_ok.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main class="wrap" id="main_wrap">
        <section>
	<h1>Welcome Euna Site </h1>
    <div id="img_content">
		    
		    <h2><?php echo $_SESSION['sName']; ?>'s!!</h2>
		    <h3>E-mail : <?php echo $_SESSION['sEmail'];?></h3>
		    <h3>Register Day : <?php echo $_SESSION['sDate']; ?></h3>
                </div>
        </section>
    </main>
    <footer></footer>
</body>
</html>

