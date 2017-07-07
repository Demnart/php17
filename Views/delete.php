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
<?php if(isset($_SESSION['error'])): ?>
    <p style="text-align: center;color: red;">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?></p>
<?php endif; ?>
<table style="border: 1px solid black;border-collapse: collapse;margin: 0 auto;text-align: center">
    <form action="/www/functionsions/delete.php" method="post">
        <tr>
            <td  style="border: 1px solid black"><label for="title">Название новости которую вы хотите удалить :</label></td>
            <td style="border: 1px solid black"><input type="text" name="title" id="title"></td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black"><input type="submit" value="Удалить"></td>
        </tr>
    </form>
</table>
<p style="text-align: center"><a href="/index.php">Главная</a></p>
</body>
</html>