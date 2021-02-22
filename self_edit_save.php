<?php include("header.php") ?>
<?php
  if (!isset($_SESSION["ses_id"])) {
  ?>
    <script>
    window.location = "login_f.php";
    </script>
  <?php
  }

  include("connect.php");

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $pass = $_POST["pass"];
  $dept_id = $_POST["dept_id"];

  $sql = "update user set name='$name', email='$email', phone='$phone', pass='$pass', dept_id=$dept_id where user_id = '$id'";
  $result = $link->query($sql);
  if ($result) {
  ?>
    <script>
      window.location = "index.php";
    </script>
  <?php
  } else {
    ?>
    <div class="alert alert-warning text-center mx-auto w-50" role="alert">
        บันทึกผิดพลาด
    </div>
    <?php
  }
?>

<?php include("header.php") ?>