<?php
    error_reporting(0);
    $edit=[null,null,null,null];
    $check=false;
    if($_POST){
        $_POST["comment"]=htmlspecialchars($_POST["comment"]);
        $_POST["name"]=htmlspecialchars($_POST["name"]);
        $_POST["password"]=htmlspecialchars($_POST["password"]);
        if($_POST["edit"]||$_POST["delete"]){
            $filename="mission_3-05.txt";
            if(file_exists($filename)){
                $lines=file($filename,FILE_IGNORE_NEW_LINES);
                foreach($lines as $line){
                    $temp=explode("<>",$line);
                    if($temp[0]==$_POST['edit_number']||$temp[0]==$_POST['delete_number']){
                        $edit[0]=$temp[1];
                        $edit[1]=$temp[2];
                        $edit[2]=$temp[0];
                        $edit[3]=$temp[4];
                    }
                }
            }
        }
        if($edit[3]==$_POST["password"]&&$_POST["password"]!=null)$check=true;
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>mission_3-05</title>
</head>

<body>
    <form action="" method="post">
        <?php
        if($_POST&&$_POST['edit']&&$check==true){
        ?>
        <input type="hidden" name="edit_numberx" value=<?php echo $edit[2]; ?> placeholder="編集番号"><br>
        <input type="text" name="name" value=<?php echo $edit[0]; ?> placeholder="名前"><br>
        <input tyoe="text" name="comment" value=<?php echo $edit[1]; ?> placeholder="コメント"><br>
        <input tyoe="text" name="password" value=<?php echo $edit[3]; ?> placeholder="パスワード"><br>
        <?php }else { ?>
        <input type="text" name="name" placeholder="名前"><br>
        <input tyoe="text" name="comment" placeholder="コメント"><br>
        <input tyoe="text" name="password" placeholder="パスワード"><br>
        <?php } ?>
        <input type="submit" name="submit">
    </form>
    
    <form action="" method="post">
        <input type="number" name="delete_number" placeholder="削除番号"><br>
        <input tyoe="text" name="password" placeholder="パスワード"><br>
        <input type="submit" name="delete" value="削除">
    </form>
    
    <form action="" method="post">
        <input type="number" name="edit_number" placeholder="編集番号"><br>
        <input tyoe="text" name="password" placeholder="パスワード"><br>
        <input type="submit" name="edit" value="編集">
    </form>
    
    <?php
    error_reporting(0);
    if($_POST){
        if($_POST["submit"]&&$_POST["name"]!=null&&$_POST["comment"]!=null){
            if($_POST["edit_numberx"]){
                $filename="mission_3-05.txt";
                $lines=file($filename,FILE_IGNORE_NEW_LINES);
                $fp=fopen($filename,"w");
                foreach($lines as $line){
                    $temp=explode("<>",$line);
                    if($_POST["edit_numberx"]!=$temp[0]){
                        fwrite($fp,$line.PHP_EOL);
                    }
                    else{
                        $line2=$temp[0]."<>".$_POST['name']."<>".$_POST['comment']."<>".date("Y/m/d日 H:i:s")."<>".$_POST["password"];
                        fwrite($fp,$line2.PHP_EOL);
                    }
                    $number+=1;
                }
            }
            else{
                $filename="mission_3-05.txt";
                $number=0;
                if(file_exists($filename)){
                    $lines=file($filename,FILE_IGNORE_NEW_LINES);
                    $number2=$lines[count($lines)-1].explode("<>");
                    $number=$number2;
                }
                $number+=1;
                $str=$number."<>".$_POST['name']."<>".$_POST['comment']."<>".date("Y/m/d日 H:i:s")."<>".$_POST["password"];
                $filename="mission_3-05.txt";
                $fp=fopen($filename,"a");
                fwrite($fp,$str.PHP_EOL);
                fclose($fp);
            }
        }
        else if($_POST["delete"]&&$check==true){
            $filename="mission_3-05.txt";
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
        $filename="mission_3-05.txt";
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