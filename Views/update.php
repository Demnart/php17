<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;text-align: center"><?php
        echo $_SESSION['error'];
        unset($_SESSION['error'])?>
    </p>
<?php endif;?>
<table style="border: 1px solid black;margin: 0 auto;border-collapse: collapse;text-align: center">
    <form action="/www/functionsions/update.php" method="post">
        <tr>
            <th style="border: 1px solid black" colspan="2">Изменить  новость</th>
        </tr>
        <tr>
            <td style="border: 1px solid black"><label for="id">Номер новости</label></td>
            <td style="border: 1px solid black"><input type="text" name="id" id="id"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black"><label for="title">Заголовок новости</label></td>
            <td style="border: 1px solid black"><input type="text" name="title" id="title"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black"><label for="text">Текст новости</label></td>
            <td style="border: 1px solid black"><textarea name="text" id="text" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td style="border: 1px solid black"><label for="author">Автор новости</label></td>
            <td style="border: 1px solid black"><input type="text" name="author" id="author"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black" colspan="2"><input type="submit" value="Загрузить"></td>
        </tr>
    </form>
</table>
<p style="text-align: center"><a href="/index.php">Главная</a></p>
</body>
</html>