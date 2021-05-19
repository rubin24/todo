<!DOCTYPE html>
<html lang="en">
<head>
    <title>Сторінка користувача</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Завдання на виконання</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>cat_name</th>
            <th>timestamp_iso8601</th>
            <th>title</th>
            <th>description</th>
            <th>button</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'connection.php';
        $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));
        mysqli_set_charset($link, "utf8");
        $sql = mysqli_query($link,"SELECT * FROM `todo` WHERE  `finish`<> '1'");
        while ($result = mysqli_fetch_array($sql)) {

            $cat_name = $result["cat_name"];
            $timestamp_iso8601 = $result["timestamp_iso8601"];
            $title = $result["title"];
            $description = $result["description"];
            echo "
                  <tr>
            <td>$cat_name</td>
            <td>$timestamp_iso8601</td>
            <td>$title</td>
            <td>$description</td>
            <td><form  action='list.php' method='get'>";
            $id = $result["id"];
            echo "
                    <button type=\"button\" class=\"btn btn-info\"><b ><a style='color: white' href=\"list.php?id={$id}\">Перегляд завдання</a></b></button>

            
            </form></td>
        </tr>
            ";
        }
        ?>


        </tbody>
    </table>
    <form  action="index.html">
        <ul class="nav justify-content-center" style="margin-top:80px;">
            <button type="submit" class="btn btn-dark btn-lg">Вийти</button>
        </ul>
    </form>
</div>

</body>
</html>
