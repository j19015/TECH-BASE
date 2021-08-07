<?php
    error_reporting(0);
    $dsn = 'データベース名';
    $user = 'ユーザ名';
    $password = 'password';
    $pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    $sql="CREATE TABLE IF NOT EXISTS m5_01"
    ."("
    ."id INT AUTO_INCREMENT PRIMARY KEY,"
    ."name char(32),"
    ."comment TEXT,"
    ."password char(32),"
    ."date char(32)"
    .");";
    $stmt=$pdo->query($sql);
    $results=null;
    $results2=null;
    $check=false;
    if($_POST){
        if($_POST["edit"]||$_POST["delete"]){
            $id=null;
            if($_POST["edit"])$id=$_POST["edit_number"];
            if($_POST["delete"])$id=$_POST["delete_number"];
            $sql="SELECT * FROM m5_01 where id=:id";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            $results2=$stmt->fetchall();
            if($id!=null&&$results2[0]["password"]==$_POST["password"])$check=true;
        }
        if($_POST["submit"]){
            if($_POST["edit_number"]&&$_POST["name"]!=null&&$_POST["comment"]!=null&&$_POST["password"]!=null){
                $sql="UPDATE m5_01 SET name=:name,comment=:comment,password=:password,date=:date where id=:id";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':date', $date,PDO::PARAM_STR);
                $stmt->bindParam(':id',$id,PDO::PARAM_INT);
                $name=$_POST["name"];
                $comment=$_POST["comment"];
                $password=$_POST["password"];
                $date=date("Y/m/d H:i:s");
                $id=$_POST["edit_number"];
                $stmt->execute();
            }
            else if($_POST["name"]!=null&&$_POST["comment"]!=null&&$_POST["password"]!=null){
                $sql=$pdo->prepare("INSERT INTO m5_01 (name, comment,password,date) VALUES (:name, :comment,:password,:date)");
                $sql->bindParam(':name',$name, PDO::PARAM_STR);
                $sql->bindParam(':comment',$comment,PDO::PARAM_STR);
                $sql->bindParam(':password',$password,PDO::PARAM_STR);
                $sql->bindParam(':date',$date,PDO::PARAM_STR);
                $name=$_POST["name"];
                $comment=$_POST["comment"];
                $password=$_POST["password"];
                $date=date("Y/m/d H:i:s");
                $sql->execute();
            }
        }
        else if($_POST["delete"]&&$_POST["delete_number"]!=null&&$check==true){
            $sql="delete from m5_01 where id=:id";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(":id",$id,PdO::PARAM_INT);
            $id=$_POST["delete_number"];
            $stmt->execute();
        }
        else if($_POST["edit"]&&$_POST["edit_number"]!=null&&$check==true){
            $sql="select * from m5_01 where id=:id";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(":id",$id,PdO::PARAM_INT);
            $id=$_POST["edit_number"];
            $stmt->execute();
            $results=$stmt->fetchall();
        }
    }
?>
<!DOCTYPE hmtl>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>mission5_1</title>
</head>

<body>
    <form action="" method="post">
        <?php if($_POST["edit"]&&$_POST["edit_number"]!=null&&$results!=null){ ?>
        <input type="hidden" name="edit_number"  value=<?php echo $results[0]["id"];?> ><br>
        <input type="text" name="name" value=<?php echo $results[0]["name"]; ?> placeholder="名前を入力してください"><br>
        <input type="text" name="comment" value=<?php echo $results[0]["comment"]; ?> placeholder="コメントを入力してください"><br>
        <input type="text" name="password" value=<?php echo $results[0]["password"]; ?> placeholder="パスワードを入力してください"><br>
        <input type="submit"name="submit">
        <?php }else{ ?>
        <input type="text" name="name" placeholder="名前を入力してください"><br>
        <input type="text" name="comment" placeholder="コメントを入力してください"><br>
        <input type="text" name="password" placeholder="パスワードを入力してください"><br>
        <input type="submit"name="submit">
        <?php } ?>
    </form>
    
    <form action="" method="post">
        <input type="number" name="delete_number" placeholder="削除する番号を入力">
        <input type="text" name="password" placeholder="パスワードを入力してください"><br>
        <input type="submit" name="delete">
    </form>
    
    <form actin="" method="post">
        <input type="number" name="edit_number" placeholder="編集する番号を入力">
        <input type="text" name="password" placeholder="パスワードを入力してください"><br>
        <input type="submit" name="edit">
    </form>
    
    <?php
        $sql="SELECT * FROM m5_01";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $results=$stmt->fetchall();
        foreach($results as $row){
            echo $row['id'].",";
            echo $row['name'].",";
            echo $row['comment'].",";
            echo $row['password'].",";
            echo $row['date']."<br>";
            echo "<hr>";
        }
    ?>
</body>