<?php  

    require('db.php');

    if (isset($_GET['id'])) {

        // id из запроса
        $id = $_GET['id'];

        $db->query("DELETE from items WHERE id='$id'");

        echo "<script>location.href='index.php'</script>";
    }
?>