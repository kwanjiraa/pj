<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
    $id = $_POST["dept_id"];
    $dept = $_POST["dept"];

    $sql = "update dept set dept = '$dept' where dept_id = $id";
    $result = $link->query($sql);
    if ($result) {
    ?>
        <script>
            window.location = "dept.php";
        </script>
    <?php
    } else {
        ?>
        <div class="alert alert-warning text-center mx-auto w-50" role="alert">
            การบันทึกการแก้ไขแผนกผิดพลาด
        </div>
        <?php
    }
?>

<?php include("footer.php") ?>