<?php  

$xml = simplexml_load_file("data.xml");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Магазинус</title>
</head>
<body>
    <h1>Магазин одежды</h1>

    <hr>

    <h2>У нас:</h2>

    <div class="items">


        <?php foreach($xml->item as $item) { ?>

        <div class="item">
            <img src=" <?php echo $item->img ?> " alt="">
            <div class="item_name"> <?php echo $item->name ?> </div>
            <div class="item__brand"> <?php echo $item->brand ?> </div>

            <a href="update.php?id=<?php echo $item['id'] ?>">Изменить</a>
            <a href="delete.php?id=<?php echo $item['id'] ?>">Удалить</a>
        </div>

        <?php } ?>

    </div>
    <a href="create.php">Добавить вещь</a>

</body>
</html>