<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>mission_2-02</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="str">
        <input type="submit" name="submit">
    </form>
    
    <?php
        if($_POST&&$_POST['str']!=NULL){
            $filename="mission_2-2.txt";
            $fp=fopen($filename,"w");
            fwrite($fp,$_POST['str'].PHP_EOL);
            fclose($fp);
            
            if($_POST['str']=="Hello World!"){
                echo "ようこそプログラミングの世界へ";
            }
            else{
                echo "処理が完了しました";
            }
        }
    ?>
</body>
    