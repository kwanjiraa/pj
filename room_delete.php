<?php include("connect.php") ?>

<?php
    $id = $_GET["i"];
    $sql = "delete from room where room_id = $id";
    $result = $link->query($sql);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
?>
