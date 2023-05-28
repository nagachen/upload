<?php
// echo"<pre>";
// print_r($_FILES['img']);
// echo"</pre>";
$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new PDO($dsn, 'root', '');

if ($_FILES['img']['error'] == 0) {
    // $name=md5(strtotime("now").$_FILES['img']['name']);
    // $tmp=explode('.',$_FILES['img']['name']);
    // $sub=array_pop($tmp);
    $name = $_FILES['img']['name'];
    
   
    // move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']); //以自已的檔名上傳
    // move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$name.$sub);  //md5編碼上傳
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $name);

    $sql = "update `images` SET `img`='$name',`desc`='{$_POST['desc']}',`type`='{$_FILES['img']['type']}',`size`='{$_FILES['img']['size']}' where `id` = '{$_POST['id']}'";
                        
    $pdo->exec($sql);
    header("location:../upload.php");


}


?>