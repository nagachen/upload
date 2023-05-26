<?php
    echo"<pre>";
    print_r($_FILES['img']);
    echo"</pre>";


    if($_FILES['img']['error']==0){
        $name=md5(strtotime("now").$_FILES['img']['name']);
        $tmp=explode('.',$_FILES['img']['name']);
        $sub=array_pop($tmp);
        
        // move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']); //以自已的檔名上傳
           move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$name.$sub);  //md5編碼上傳

    }


?>