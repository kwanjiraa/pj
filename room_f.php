<?php include("header.php") ?>
  
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 border shadow">
      <form action="room_add.php" method="post" enctype="multipart/form-data" class="p-4">
        <div class="form-group">
          <label for="room_id">รหัสห้องประชุม</label>
          <input type="text" class="form-control" id="room_id" name="room_id" aria-describedby="room_idHelp" autofocus required maxlength="3">
          <small id="room_idHelp" class="form-text text-muted">ป้อนรหัสห้องประชุม ตัวเลข ไม่เกิน 3 หลัก</small>
        </div>
        <div class="form-group">
          <label for="room">ห้องประชุม</label>
          <input type="text" class="form-control" id="room" name="room" required>
          <small id="roomHelp" class="form-text text-muted">ป้อนชื่อห้องประชุม</small>
        </div>
        <div class="form-group">
          <label for="detail">รายละเอียด</label>
          <textarea class="form-control" name="detail" rows="5" required></textarea>
        </div>
        <div class="form-group">
        <label for="fileUpload">เลือกภาพห้องประชุม</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="fileUpload" name="fileUpload" accept="image/*" required>
          <label class="custom-file-label" for="fileUpload">เลือกภาพ</label>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">เพิ่มห้องประชุม</button>      
      </form>
    </div>
  </div>

<?php include("footer.php") ?>

<script>
  $('#fileUpload').on('change',function(){
    let fileName = $(this).val()
    $(this).next('.custom-file-label').html(fileName)
  })
</script>