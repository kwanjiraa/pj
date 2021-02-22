<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
  $id = $_POST["room_id"];
  $room = $_POST["room"];
  $detail = $_POST["detail"];

  if ( $_FILES["fileUpload"]["error"] == 4 ) {
    $sql = "update room set room = '$room', detail = '$detail' where room_id = $id";
    $result = $link->query($sql);
    if ($result) {
      ?>
      <script>
        window.location = "room.php";
      </script>
      <?php        
    }
    else {
      ?>
      <div class="alert alert-warning text-center mx-auto w-50" role="alert">
          การบันทึกข้อมูลผิดพลาด
      </div>
      <?php        
    }
  }
  else {
    $file = $_FILES["fileUpload"]["name"];
    $fileArray = explode(".", $file);
    $fileArray[0] = $id;
    $saveFile = "$fileArray[0].$fileArray[1]";
    $sql = "update room set room = '$room', detail = '$detail', pic = '$saveFile' where room_id = $id";
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
  }
  echo $sql;

?>

<?php include("footer.php") ?>