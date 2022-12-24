<?php 

    require("db.php");

    if (isset($_POST['submit'])) {
        
        $imgitem = $_POST['imgitem'];
    
        $nameitem = $_POST['nameitem'];
    
        $branditem = $_POST['branditem'];

        $id = $db->query("SELECT MAX(id) from items")->fetchAll()[0][0]+ 1;

        $db->query("INSERT INTO items (id, img_path, name, brand) VALUE ('$id+1', '$imgitem', '$nameitem', '$branditem')");


        echo "<script>
        alert('Товар добавлен!');
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
    <title>Создавус</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="imgitem" required placeholder="url вещи">
        <br>
        <input type="text" name="nameitem" required placeholder="введите название вещи">
        <br>
        <input type="text" name="branditem" required placeholder="введите бренд вещи">
        <br>
        <button type="submit" name="submit">Создать</button>
    </form>

    <a href="index.php">Назад</a>
</body>
</html>