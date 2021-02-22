<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
    $id = $_POST["dept_id"];
    $d = $_POST["dept"];

    $sql = "insert into dept values('$id', '$d')";
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
        การบันทึกแผนกหรือฝ่าย ผิดพลาด
        <p class="mt-3"><button class="btn btn-success" onclick="history.back()">กลับหน้าบันทึก</button></p>
    </div>
    <?php
    }
?>

<?php include("footer.php") ?>