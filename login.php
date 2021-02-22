<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
    $u = $_POST["username"];
    $p = $_POST["pwd"];

    $sql = "select * from user where username='$u' and pass='$p' and status = 1";
    $result = $link->query($sql);
    if ($result->num_rows == 0) {
        ?>
        <div class="alert alert-warning text-center mx-auto w-50" role="alert">
            ไม่พบข้อมูลผู้ใช้งาน
        </div>
        <?php
    } else {
        $data = $result->fetch_object();
        // สร้างเซสชัน
        $_SESSION["ses_id"] = $data->user_id;
        $_SESSION["ses_name"] = $data->name;
        $_SESSION["ses_type"] = $data->user_type;
        ?>
            <script>
                window.location = "index.php";
            </script>
        <?php
    }
?>

<?php include("footer.php") ?>