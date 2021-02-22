<?php include("header.php") ?>
  
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 border shadow">
      <form action="news_add.php" method="post" enctype="multipart/form-data" class="p-4">
        <div class="form-group">
          <label for="news">ข่าว</label>
          <input type="text" class="form-control" id="news" name="news" required>
          <small id="newsHelp" class="form-text text-muted">ป้อนหัวข้อข่าว</small>
        </div>
        <div class="form-group">
          <label for="detail">รายละเอียด</label>
          <textarea class="form-control" name="detail" rows="5" required></textarea>
        </div>
        <div class="form-group">
        <label for="fileUpload">เลือกไฟล์เอกสารแนบ</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="fileUpload" name="fileUpload" accept="files/*">
          <label class="custom-file-label" for="fileUpload">เลือกไฟล์</label>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">เพิ่มข่าวสาร</button>      
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