<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset-"utf-8">
    <title>mission_1-20</title>
</head>
<body>
    <form action="" method="post">
         <input type="number" name="num" value="" placeholder="数字を入力してください">
        <input type="submit" name="submit">
    </form>
    <?php
        if($_POST){
        $num=$_POST["num"];
        $filename="mission_1-27.txt";
        $fp=fopen($filename,"a");
        fwrite($fp,$num.PHP_EOL);
        fclose($fp);
        echo "書き込み成功!<br>";
        if(file_exists($filename)){
            $lines=file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                if((int)$line%3==0 && (int)$line%5==0){
                    echo "FizzBuzz<br>";
                }
                elseif((int)$line%5==0){
                    echo "Fizz<br>";
                }
                elseif((int)$line%3==0){
                    echo "Buzz<br>";
                }
                else{
                    echo $line."<br>";
                }
            }
        }
        }
    ?>
</body>
</html>