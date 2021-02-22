<?php 
    include("header.php");
    include("connect.php");

    //อ่านค่าจากฟอร์ม
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pass = $_POST["pass"];
    $dept_id = $_POST["dept_id"];

    $sql = "insert into user values(null, '$username', '$name', '$email', '$phone', '$pass', $dept_id, 0, 1)";
    $result = $link->query($sql);
    if ($result) {
        ?>
        <div class="alert alert-success text-center mx-auto w-50" role="alert">
            บันทึกสมาชิกเรียบร้อย รอการอนุมัติจากผู้ดูแลระบบ
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-warning text-center mx-auto w-50" role="alert">
            บันทึกสมาชิกผิดพลาด
        </div>
        <?php
    }
?>


<?php include("footer.php") ?>