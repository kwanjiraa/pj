<?php include("header.php") ?>
<?php 
    include("connect.php");

    $title = $_POST["title"];
    $amount = $_POST["amount"];
    $dt_start = $_POST["dt_start"];
    $dt_end = $_POST["dt_end"];
    $user_id = $_POST["user_id"];
    $room_id = $_POST["room_id"];

    $sql = "SELECT * FROM book WHERE ('$dt_start' between dt_start and dt_end) or ('$dt_end' between dt_start and dt_end) and room_id = '$room_id'";

    $result = $link->query($sql);
    $num = $result->num_rows;

    if($num > 0)
    {
    echo "<script>";
    echo "alert('ห้องไม่ว่าง!! โปรดจองเวลาอื่น');";
    echo "window.history.back();";
    echo "</script>";
    }else{

    $sql = "insert into book values(null, '$title', $amount, now(), '$dt_start', '$dt_end', $user_id, $room_id, 0)";
    
    $result = $link->query($sql);
    mysqli_close($con);
    }
    if ($result) {
        ?>
        <script>
            window.location = "book.php";
        </script>
        <?php
    }
    else {
        echo "Save Not OK!";
    }
?>

<?php include("footer.php") ?>