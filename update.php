<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=upload";
$pdo=new PDO($dsn,'root','');

$sql="select * from `images` where `id`='{$_GET['id']}'";
$imgs=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

?>
 <style>
        img{
            width: 200px;
            border: 10px solid black;
            margin: 3px;
        }
    </style>
<body>
 <h1 class="header">重新上傳</h1>
 <!----建立你的表單及設定編碼----->
<form action="./api/update.php" method="post" enctype="multipart/form-data">
<div>
    上傳檔案:<input type="file" name="img" id="img">
</div>
<div>
    描述:<input type="text" name="desc" id="desc" value="<?=$imgs['desc'];?>">
</div>
<div>
    <input type="hidden" name="id" value="<?=$imgs['id'];?>">
    <input type="submit" value="修改">
</div>
</fome>
    <table>
    <tr>
            <td>ID</td>
            <td>圖片 </td>
            <td>檔名 </td>
            <td>類別 </td>
            <td>大小 </td>
        </tr>
        <tr>
            <td><?=$imgs['id'];?></td>
            <td><img src=".\img\<?=$imgs['img'];?>"></td>
            <td><?=$imgs['img'];?></td>
            <td>
                <?php
                switch($imgs['type']){
                    case 'image/jpeg':
                        echo "jpg";
                    break;
                    case "image/png";
                        echo "png";
                    break;
                    case "image/bmp";
                        echo "bmp";
                    break;
                case "image/gif";
                    echo "gif";
                break;
                }
                ?>
                </td>
            <td><?=floor($imgs['size']/1024)."kB";?></td>       
        </tr>
    </table>
</body>
</html>