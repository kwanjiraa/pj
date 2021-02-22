<?php include("header.php") ?>
<?php
  if (!isset($_SESSION["ses_id"])) {
  ?>
    window.location = "login_f.php";
  <?php
  }

  include("connect.php");
  $sql = "select * from user where user_id = '".$_SESSION["ses_id"]."'";
  $result = $link->query($sql);
  $data = $result->fetch_object();

  $result2 = $link->query("select * from dept order by dept");
?>
  
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 border shadow">
      <form action="self_edit_save.php" method="post" class="p-4">
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" id="id" name="id" class="form-control" value="<?php echo $data->user_id?>" readonly>
        </div>
        <div class="form-group">
          <label for="username">UserName</label>
          <input type="text" id="username" name="username" class="form-control" value="<?php echo $data->username?>" readonly>
        </div>
        <div class="form-group">
          <label for="name">ชื่อ</label>
          <input type="text" id="name" name="name" class="form-control" value="<?php echo $data->name?>" required>
        </div>
        <div class="form-group">
          <label for="email">อีเมล</label>
          <input type="email" id="email" name="email" class="form-control" value="<?php echo $data->email?>" required>
        </div>
        <div class="form-group">
          <label for="phone">โทรศัพท์</label>
          <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $data->phone?>" required>
        </div>

        <div class="form-group">
          <select class="custom-select" name="dept_id" required>
            <option selected disabled>เลือกแผนกวิชา</option>
            <?php while ($data2 = $result2->fetch_object()): ?>
              <?php if ($data->dept_id == $data2->dept_id): ?>
                <option value="<?php echo $data2->dept_id?>" selected><?php echo $data2->dept?></option>
              <?php else: ?>
                <option value="<?php echo $data2->dept_id?>"><?php echo $data2->dept?></option>
              <?php endif ?>
            <?php endwhile ?>
          </select>
        </div>

        <div class="form-group">
          <label for="pass">รหัสผ่าน</label>
          <input type="text" id="pass" name="pass" class="form-control" value="<?php echo $data->pass?>" required>
        </div>
        <button type="submit" class="btn btn-primary mr-3">บันทึก</button>
        <a href="index.php" class="btn btn-warning">ยกเลิกการแก้ไข</a> 
      </form>
    </div>
  </div>

<?php include("footer.php") ?>