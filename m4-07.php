<?php 
    // DB接続設定
    $dsn = 'データベース名';
    $user = 'ユーザ名';
    $password = 'password';
    $pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $id=1;
    $name="高橋碧人";
    $comment="aaaaaaaaaaaaaaaaaaaa";
    $sql="UPDATE tbtest SET name=:name,comment=:comment where id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
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