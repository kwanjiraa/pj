<?php include("header.php") ?>
<?php include("connect.php") ?>
<?php
    $i = $_GET["i"];
    $sql = "select * from room where room_id = $i";
    $result = $link->query($sql);
    $data = $result->fetch_object();
?>
  
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 border shadow">
    <form action="room_up2.php" method="post" enctype="multipart/form-data" class="p-4">
      <div class="form-group">
        <label for="room_id">รหัสห้องประชุม</label>
        <input value="<?php echo $data->room_id?>" type="text" class="form-control" name="room_id" aria-describedby="room_idHelp" readonly>
      </div>
      <div class="form-group">
        <label for="room">ห้องประชุม</label>
        <input value="<?php echo $data->room?>" type="text" class="form-control" id="room" name="room" required>
        <small id="roomHelp" class="form-text text-muted">ป้อนชื่อห้องประชุม</small>
      </div>
      <div class="form-group">
        <label for="detail">รายละเอียด</label>
        <textarea class="form-control" name="detail" rows="5" required><?php echo $data->detail?></textarea>
      </div>
      <div class="form-group">
      <label for="fileUpload">เลือกภาพห้องประชุม</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="fileUpload" name="fileUpload" accept="image/*">
        <label class="custom-file-label" for="fileUpload">เลือกภาพ</label>
      </div>
      </div>
      <button type="submit" class="btn btn-primary mr-3">บันทึกการแก้ไข</button>      
      <a href="room.php" class="btn btn-warning">ยกเลิกการแก้ไข</a>      
    </form>
  </div>
</div>

<?php include("footer.php") ?>