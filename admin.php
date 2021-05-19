<!DOCTYPE html>
<html lang="uk">
<head>
    <title>ToDo Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top:100px;width:100% ; text-align: center">
    <h2>Ви зайшли як Адміністратор</h2>
    <ul class="nav justify-content-center">
        <form  action="" method="post">
            <ul class="nav justify-content-center" style="margin-top:80px;">
                <input type="submit" class="btn btn-danger btn-lg" name="button_reg" value="Завантажити файл" </input>
            </ul>
<?php

if (!empty($_POST["button_reg"])) {
    require_once 'connection.php';
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
    mysqli_set_charset($link, "utf8");
    $file = fopen("todo.txt", "r");
    if (!$file) {
        echo "<p>Неможливо відкрити видалений файл.\n";
        exit;
    }
while (!feof($file)) {
    $line = fgets($file, 1024);
    $line = htmlspecialchars($line);

   $pos = stripos ($line, ' ');
   $cat_name = substr ($line,0, $pos);
    $line = substr ($line, $pos+1);
    $pos = stripos ($line, '+');
    $timestamp_iso8601 = substr ($line,0, $pos);
    $line = substr ($line, $pos+6);
    $pos = stripos ($line, ';');
    $title = substr ($line,0, $pos);
    $description = $line = substr ($line, $pos+1);

    $sql = mysqli_query($link,"SELECT * FROM `todo` WHERE `description`= '$description' AND `finish`<> '1'");
    $count = mysqli_num_rows($sql);
    if ($count == 0){
        $sql_r = mysqli_query($link,"INSERT INTO `todo` (`cat_name`, `timestamp_iso8601`, `title`, `description`, `finish`) VALUES ('$cat_name', '$timestamp_iso8601', '$title', '$description', '0') ");

    }

}
    fclose($file);
    echo '<script>
        alert("Файл завантажено!");
        </script>';
}
?>
        </form>
        <form  action="user.php">
            <ul class="nav justify-content-center" style="margin-top:80px; margin-left: 40px">
                <button type="submit" class="btn btn-info btn-lg">Перегляд записів</button>
            </ul>
        </form>
    </ul>
    <form  action="index.html">
        <ul class="nav justify-content-center" style="margin-top:80px;">
            <button type="submit" class="btn btn-dark btn-lg">Вийти</button>
        </ul>
    </form>
</div>

</body>
</html>
