<?php 
    // DB接続設定
    $dsn = 'データベース名';
    $user = 'ユーザ名';
    $password = 'password';
    $pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql="drop table m5_01";
    $stmt=$pdo->prepare($sql);
    $stmt->execute()
?>    