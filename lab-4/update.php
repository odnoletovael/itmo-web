<?php 
    $xml = simplexml_load_file("data.xml");
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach($xml->item as $item) {
            if ($item['id'] == $id) {
                $name = $item->name;
                $img = $item->img;
                $brand = $item->brand;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];

        foreach($xml->item as $item) {
            if ($item['id'] == $id) {
                $item->name = $_POST['nameitem'];
                $item->brand = $_POST['branditem'];
                $item->img = $_POST['imgitem'];
                break;
            }
        }

        $xml->saveXML("data.xml");
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