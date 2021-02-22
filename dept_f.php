<?php include("header.php") ?>
  
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 border shadow">
      <form action="dept_add.php" method="post" class="p-4">
        <div class="form-group">
          <label for="dept_id">รหัสแผนก</label>
          <input type="text" class="form-control" id="dept_id" name="dept_id" aria-describedby="dept_idHelp" autofocus required maxlength="3">
          <small id="dept_idHelp" class="form-text text-muted">ป้อนรหัสแผนก ตัวเลข ไม่เกิน 3 หลัก</small>
        </div>
        <div class="form-group">
          <label for="dept">แผนก</label>
          <input type="text" class="form-control" id="dept" name="dept" required>
          <small id="deptHelp" class="form-text text-muted">ป้อนชื่อแผนก</small>
        </div>
        <button type="submit" class="btn btn-primary">เพิ่มแผนก</button>      
      </form>
    </div>
  </div>

<?php include("footer.php") ?>