<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
    $id = $_POST["room_id"];
    $room = $_POST["room"];
    $detail = $_POST["detail"];

    // echo "Upload: " . $_FILES["fileUpload"]["name"] . "<br />";
    // echo "Type: " . $_FILES["fileUpload"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["fileUpload"]["size"] / 1024) . " Kb<br />";
    // echo "Stored in: " . $_FILES["fileUpload"]["tmp_name"];

    $file = $_FILES["fileUpload"]["name"];
    $fileArray = explode(".", $file);
    $fileArray[0] = $id;
    
    $saveFile = "$fileArray[0].$fileArray[1]";
    
    $sql = "insert into room values('$id', '$room', '$detail', '$saveFile')";
    $result = $link->query($sql);
    if ($result) {
      if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "pic/$saveFile")) {
      ?>
      <script>
        window.location = "room.php";
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