<?php 
    if (isset($_POST['submit'])) {
        // url введенный пользователем
        $imgitem = $_POST['imgitem'];
        // название книги введенный пользователем
        $nameitem = $_POST['nameitem'];
        // автор введенный пользователем
        $branditem = $_POST['branditem'];

        $xml = simplexml_load_file("data.xml");

        // обращаемся к последнему эл-ту
        $lastEl = $xml->item[$xml->count() - 1];

        // создаем тег корневой item 
        $newitem = $xml->addChild('item', '');
        $newitem->addChild('name', $nameitem);
        $newitem->addChild('brand', $branditem);
        $newitem->addChild('img', $imgitem);

        // добавляем атрибут id на один больше чем у последнего
        $newitem->addAttribute('id', $lastEl['id'] + 1);

        $xml->saveXML("data.xml");

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
        <input type="text" name="imgitem" placeholder="url вещи">
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