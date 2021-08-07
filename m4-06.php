<?php 
    // DB接続設定
    $dsn = 'データベース名';
    $user = 'ユーザ名';
    $password = 'password';
    $pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql="SELECT * FROM tbtest WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(":id",$id,PdO::PARAM_INT);
    $id=1;
    $stmt->execute();
    $results=$stmt->fetchall();
    foreach($results as $row){
        echo $row['id'].",";
        echo $row['name'].",";
        echo $row['comment'].","."<br>";
        echo "<hr>";
    }
?>    