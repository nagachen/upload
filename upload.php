<?php

/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
    <style>
        img {
            width: 200px;
            border: 10px solid black;
            margin: 3px;
        }
    </style>
</head>

<body>
    <h1 class="header">檔案上傳練習</h1>
    <!----建立你的表單及設定編碼----->
    <form action="./api/upload.php" method="post" enctype="multipart/form-data">
        <div>
            上傳檔案:<input type="file" name="img" id="img">
        </div>
        <div>
            描述:<input type="text" name="desc" id="desc">
        </div>
        <div>
            <input type="submit" value="上傳">
        </div>
        </fome>




        <!----建立一個連結來查看上傳後的圖檔---->
        <?php
        $dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
        $pdo = new PDO($dsn, 'root', '');

        $sql = "select * from `images`";
        $imgs = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);


        ?>
        <table>
            <tr>
                <td>序號</td>
                <td>圖片 </td>
                <td>檔名 </td>
                <td>類別 </td>
                <td>大小 </td>
            </tr>
            <?php
            foreach ($imgs as $idx => $img) {

            ?>
                <tr>
                    <td><?= $idx + 1; ?></td>
                    <td>
                        <?php
                        switch ($img['type']) {
                            case 'image/jpeg';
                            case "image/png";                       
                            case "image/gif";
                            ?><img src=".\img\<?= $img['img']; ?>">
                            <?php
                                break;
                            case 'application/octet-stream':
                                ?><img src=".\icon\sql.png">
                            <?php
                                break;
                            case 'application/x-zip-compressed':
                                ?><img src=".\icon\zip.jpg">
                            <?php
                                break;
                        }
                        ?>
                        
                    </td>
                    <td><?= $img['img']; ?></td>
                    <td>
                        <?php
                        switch ($img['type']) {
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
                            case 'application/octet-stream':
                                echo "sql";
                                break;
                            case 'application/x-zip-compressed':
                                echo "zip";
                                break;
                        }
                        ?>
                    </td>
                    <td><?= floor($img['size'] / 1024) . "kB"; ?></td>
                    <td>
                        <button type="button" onclick="location.href='./update.php?id=<?= $img['id']; ?>'">編輯</button>
                        <button type="button" onclick="location.href='./api/del_file.php?id=<?= $img['id']; ?>'">刪除</button>
                    </td>


                </tr>



            <?php

            }
            ?>
        </table>
</body>

</html>