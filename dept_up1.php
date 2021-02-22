<?php include("header.php") ?>
<?php include("connect.php") ?>
<?php
    $i = $_GET["i"];
    $sql = "select * from dept where dept_id = $i";
    $result = $link->query($sql);
    $data = $result->fetch_object();
?>
  
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 border shadow">
      <form action="dept_up2.php" method="post" class="p-4">
        <div class="form-group">
          <label for="btid">รหัสแผนก</label>
          <input value="<?php echo $data->dept_id?>" readonly type="text" class="form-control" id="dept_id" name="dept_id">
        </div>
        <div class="form-group">
          <label for="dept">แผนก</label>
          <input value="<?php echo $data->dept?>" type="text" class="form-control" id="dept" name="dept" required>
          <small id="deptHelp" class="form-text text-muted">ป้อนชื่อแผนก</small>
        </div>
        <button type="submit" class="btn btn-primary mr-3">บันทึกการแก้ไข</button>  
        <a href="dept.php" class="btn btn-warning">ยกเลิกการแก้ไข</a>     
      </form>
    </div>
  </div>

<?php include("footer.php") ?>