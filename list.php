<!DOCTYPE html>
<html lang="en">
<head>
    <title>Сторінка завдань</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid ">
    <h2 style="text-align: center">Відмітка про виконання завдання</h2>

<?php

require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");

    $id = $_GET["id"] ;

    $sql = mysqli_query($link,"SELECT * FROM `todo` WHERE  `id`= '$id'");
while ($result = mysqli_fetch_array($sql)) {

    $cat_name = $result["cat_name"];
    $timestamp_iso8601 = $result["timestamp_iso8601"];
    $title = $result["title"];
    $description = $result["description"];

echo "
    <div class='row' style='font-size: x-large;'>
        <div class='col-sm-4 ' >
        
        <p>cat_name</p>
        <p>title</p>
        <p>description</p>
       
        </div>
        <div class='col-sm-8 ' >
       <p> $cat_name</p>
       <p> $title</p>
       <p> $description</p>
        </div>
    </div>
    ";
 }

?>
    <ul class="nav justify-content-center">
        <form  action="" method="post">
            <ul class="nav justify-content-center" style="margin-top:80px;">
                <input type="submit" class="btn btn-danger btn-lg" name="button_reg" value="Роботу виконано" </input>
            </ul>
            <?php

            if (!empty($_POST["button_reg"])) {

                    $sql = mysqli_query($link,"UPDATE `todo` SET `finish`= '1'  WHERE `id`= '$id'");

                header("Refresh:0; url=user.php");
            }
            ?>
        </form>
        <form  action="user.php">
            <ul class="nav justify-content-center" style="margin-top:80px; margin-left: 40px">
                <button type="submit" class="btn btn-info btn-lg">Перегляд записів</button>
            </ul>
        </form>
    </ul>
</div>

</body>
</html>
