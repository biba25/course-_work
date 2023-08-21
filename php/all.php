<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'historick';
$link = mysqli_connect($host, $user, $pass, $db);
mysqli_query($link, "SET NAMES 'utf8'");

$query = "SELECT * FROM stats";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row)
    ;

foreach ($data as $value) { ?>
    <div class="stat">
        <h1 class="title">
            <?= $value['title'] ?>
        </h1>
        <p class="text">
            <?= $value['text'] ?>
        </p>
        <img src=" data:image/jpeg;base64,<?= base64_encode($value['image']) ?>" />
    </div>
<? } ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/stylePhP.css">
    <title>Статья</title>
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
                    </div>
                </div>
            </head>
            <section>
                <div class="section"></div>
            </section>
        </div>
    </div>
</body>

</html>