<?php
    //header("Content-Type: text/html; charset=utf8");
    include('php/utils/connect.php');

    $title = $_POST['title'];
    $text = $_POST['newsText'];
    $uploadfile; // 图片的名字Der Name des Bildes
    if($_POST['uploadpic']=='upload'){
      $dest_folder   =  "D:/picture/";   //上传图片保存的路径 图片放在同级的picture文件夹里
      //Der Pfad, in dem das hochgeladene Bild gespeichert wird Das Bild wird im Bildordner der gleichen Ebene abgelegt.
      $arr=array();   //定义一个数组存放上传图片的名称。Definieren Sie ein Array, um die Namen der hochgeladenen Bilder zu speichern.
      $count=0;
      if(!file_exists($dest_folder)){
          mkdir($dest_folder,700); // 创建文件夹，并给予最高权限Erstellen Sie einen Ordner und geben Sie die höchste Autorität
        }
      $tp = array("image/gif","image/pjpeg","image/jpeg","image/png");    //检查上传文件是否在允许上传的类型Überprüfen Sie, ob die hochgeladene Datei einen Typ hat, der das Hochladen zulässt
      foreach ($_FILES["uploads"]["error"] as $key => $error){
          if(!in_array($_FILES["uploads"]["type"][$key],$tp)){
                echo "<script language='javascript'>";
                echo "alert(\"Dateitypfehler!\");";//文件类型错误Dateitypfehler
                echo "</script>";
                  exit;
            }
          if($error == UPLOAD_ERR_OK){
            $tmp_name = $_FILES["uploads"]["tmp_name"][$key];
            $a=explode(".",$_FILES["uploads"]["name"][$key]);  //截取文件名跟后缀Dateiname und -suffix abfangen
              // $prename = substr($a[0],10);   //如果图片名称不是所要的可以用截取字符得到
              //Wenn der Bildname nicht Ihren Wünschen entspricht, können Sie das Abfangzeichen verwenden, um zu erhalten
            $prename = $a[0];
            $name = date('YmdHis').mt_rand(100,999).".".$a[1];  // 文件的重命名 （日期+随机数+后缀）Dateiumbenennung (Datum+Zufallszahl+Suffix)
            $uploadfile = $dest_folder.$name;     // 文件的路径Dateipfad
            move_uploaded_file($tmp_name, $uploadfile);
            $arr[$count]=$uploadfile;
            $query="insert into photos(photo-id,photo,pLike) values('$prename','$uploadfile','0')"; // 插入到数据库 In Datenbank einfügen
            $res=mysql_query($query);
            if($res)
             echo $prename."Erfolg<br/>";
             echo $uploadfile."<br />";
            $count++;
             }
            }
            echo "In Summe".$count."dokumentieren";
            }
    
    
    