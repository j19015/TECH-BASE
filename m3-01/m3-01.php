<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>mission_3-01</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前"><br>
        <input tyoe="text" name="comment" placeholder="コメント"><br>
        <input type="submit">
    </form>
    
    <?php
        if($_POST){
            $filename="mission_3-01.txt";
            $number=0;
            if(file_exists($filename)){
                $lines=file($filename,FILE_IGNORE_NEW_LINES);
                $number=count($lines);
            }
            $number+=1;
            $str=$number."<>".$_POST['name']."<>".$_POST['comment']."<>".date("Y/m/d日 H:i:s");
            $filename="mission_3-01.txt";
            $fp=fopen($filename,"a");
            fwrite($fp,$str.PHP_EOL);
            fclose($fp);
        }
    ?>
</body>