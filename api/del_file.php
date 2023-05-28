<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=upload";
$pdo=new PDO($dsn,'root','');

// echo"<pre>";
// print_r($_GET['id']);
// echo"</pre>";

$sql="delete from `images` where `id`= '{$_GET['id']}'";
$img=$pdo->query("select * from `images` where `id`='{$_GET['id']}'")
            ->fetch(PDO::FETCH_ASSOC);

unlink("../img/".$img['img']);
$pdo->exec($sql);
header("location:../upload.php");