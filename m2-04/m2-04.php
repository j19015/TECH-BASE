<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset-"utf-8">
    <title>mission_1-20</title>
</head>
<body>
    <?php
    $filename="mission_2-4.txt";
    if(file_exists($filename)){
        $lines=file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
            echo $line."<br>";
        }
    }
    ?>
</body>
</html>