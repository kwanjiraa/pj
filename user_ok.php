<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
    if (!isset($_SESSION["ses_id"]) || $_SESSION["ses_type"] != 0) {
        die("ท่านไม่มีสิทธิ์");
    }
?>

<?php
    $id = $_GET["id"];
    $sql = "update user set status = 1 where user_id = '$id'";
    $result = $link->query($sql);
    if ($result) {
    ?>
        <script>
            window.location = "user.php";
        </script>
    <?php
    } else {
        ?>
        <div class="alert alert-warning text-center mx-auto w-50" role="alert">
            ปรับปรุงสิทธิ ผิดพลาด
        </div>
        <?php
    }
?>


<?php include("footer.php") ?>