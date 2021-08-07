<?php 
    // DB接続設定
    $dsn = 'データベース名';
    $user = 'ユーザ名';
    $password = 'password';
    $pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql="SHOW CREATE TABLE m5_01";
    $result=$pdo->query($sql);
    foreach($result as $row){
        echo $row[1];
    }
    echo "<br>";
?>    