<?php 

    require("db.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        $item = $db -> query("SELECT * FROM items WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC)[0];

        $name = $item['name'];
        $img = $item['img_path'];
        $brand = $item['brand'];


    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];

        $name = $_POST['nameitem'];
        $brand = $_POST['branditem'];
        $img = $_POST['imgitem'];

        $db->query("UPDATE items SET name='$name', brand='$brand', img_path='$img' WHERE id='$id' ");

        echo "<script>
        alert('данные успешно обновлены');
        location.href = 'index.php';
        </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Редактус</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="imgitem" value="<?php echo $img ?>">
        <br>
        <input type="text" name="nameitem" value="<?php echo $name ?>">
        <br>
        <input type="text" name="branditem" value="<?php echo $brand ?>">
        <!--  -->
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <br>
        <button type="submit" name="submit">Сохранить</button>
    </form>

    <a href="index.php"> назад</a>
</body>
</html>