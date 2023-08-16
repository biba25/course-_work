<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'historick';
$link = mysqli_connect($host, $user, $pass, $db);
mysqli_query($link, "SET NAMES 'utf8'");

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (!empty($_POST) and !empty($_FILES)) {
    $image = $_FILES["image"];
    $title = $_POST["title"];
    $text = $_POST["text"];
    $info = getimagesize($image["tmp_name"]);
    $blob = addslashes(file_get_contents($image["tmp_name"]));
    $sql = "INSERT INTO `stats` (`image`, `title`, `text`) VALUES ('" . $blob . "', '" . $title . "' , '" . $text . "')";
    mysqli_query($link, $sql) or die(mysqli_error($link));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <title>Войти</title>
    <link rel="stylesheet" href="../style/stylePhP5.css" />
</head>

<body>
    <div class="wrapper">
        <div class="head_bg"></div>
        <div class="main">

            <head>
                <div class="head">
                    <div class="menu">
                        <div><a href="./index.html">Главная</a></div>
                        <div><a href="./index3.html">Истории</a></div>
                        <div><a href="./index4.html">Подборка</a></div>
                        <div><a href="./all.php">Статья</a></div>
                    </div>
                </div>
            </head>
            <section>
                <div class="section">
                    <div class="avatar"></div>
                    <div>
                        <div class="name">Имя Фамилия</div>
                        <div class="name_user">@ник</div>
                    </div>
                    <div class="info_user">
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in culpa qui officia deserunt mollit anim id est laborum."
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </div>
                    <div class="line"></div>
                    <div>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <p>
                                <label>Upload Image</label>
                                <input type="file" name="image" accept="image/*" required />
                            </p>
                            <p>
                                <label>Заголовок статьи</label>
                                <input type="text" name="title" required />
                            </p>
                            <p>
                                <label>Описание</label>
                                <textarea name="text" required></textarea>
                            </p>
                            <input type="submit" />
                        </form>
                    </div>
                </div>
                <div id="disqus_thread"></div>
            </section>
        </div>
    </div>
</body>

</html>