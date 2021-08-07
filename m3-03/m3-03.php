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
        <input type="submit" name="submit">
    </form>
    
    <form action="" method="post">
        <input type="number" name="delete_number" placeholder="削除番号"><br>
        <input type="submit" name="delete" value="削除">
    </form>
    
    
    <?php
    error_reporting(0);
    if($_POST){
        if($_POST["submit"]&&$_POST["name"]!=null&&$_POST["comment"]!=null){
                $filename="mission_3-03.txt";
                $number=0;
                if(file_exists($filename)){
                    $lines=file($filename,FILE_IGNORE_NEW_LINES);
                    $number2=$lines[count($lines)-1].explode("<>");
                    $number=$number2;
                }
                $number+=1;
                $str=$number."<>".$_POST['name']."<>".$_POST['comment']."<>".date("Y/m/d日 H:i:s");
                $filename="mission_3-03.txt";
                $fp=fopen($filename,"a");
                fwrite($fp,$str.PHP_EOL);
                fclose($fp);
        }
        else if($_POST["delete"]){
            $filename="mission_3-03.txt";
            $lines=file($filename,FILE_IGNORE_NEW_LINES);
            $fp=fopen($filename,"w");
            foreach($lines as $line){
                $temp=explode("<>",$line);
                if($_POST["delete_number"]!=$temp[0]){
                    fwrite($fp,$line.PHP_EOL);
                }
                $number+=1;
            }
        }
        
    }
    ?>
    <?php
        $filename="mission_3-03.txt";
        if(file_exists($filename)){
            $lines=file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                $split=explode("<>",$line);
                foreach($split as $s){
                    echo $s." ";
                }
                echo "<br>";
            }
        }
    ?>
</body>