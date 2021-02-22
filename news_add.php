<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
    
    $news = $_POST["news"];
    $detail = $_POST["detail"];

    // echo "Upload: " . $_FILES["fileUpload"]["name"] . "<br />";
    // echo "Type: " . $_FILES["fileUpload"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["fileUpload"]["size"] / 1024) . " Kb<br />";
    // echo "Stored in: " . $_FILES["fileUpload"]["tmp_name"];

    $saveFile = $_FILES["fileUpload"]["name"];
    
    $sql = "insert into news values(null, '$news', '$detail', now(), '$saveFile', 1)";
    $result = $link->query($sql);
    if ($result) {
      if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "files/$saveFile")) {
      ?>
      <script>
        window.location = "index.php";
      </script>
      <?php
      }
    } else {
      ?>
      <div class="alert alert-warning text-center mx-auto w-50" role="alert">
        การบันทึกห้องประชุมผิดพลาด
      </div>
      <?php
    }
?>

<?php include("footer.php") ?>