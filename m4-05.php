<?php 
    // DB接続設定
    $dsn = 'データベース名';
    $user = 'ユーザ名';
    $password = 'password';
    $pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql=$pdo->prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
    $sql->bindParam(':name',$name, PDO::PARAM_STR);
    $sql->bindParam(':comment',$comment,PDO::PARAM_STR);
    $name="高橋幸希";
    $comment="小畑はーーーー誰";
    $sql->execute();
?>    