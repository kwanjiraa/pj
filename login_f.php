<?php include("header.php") ?>
  
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 border shadow">
      <form action="login.php" method="post" class="p-4">
        <div class="text-center">
          <img src="images/login.jpg" class="rounded my-3" width="120">
        </div>
        <div class="form-group">
          <label for="username">User Name</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" autofocus required>
          <small id="usernameHelp" class="form-text text-muted">ป้อนชื่อเข้าใช้งานระบบ</small>
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" id="pwd" name="pwd" required>
          <small id="pwdHelp" class="form-text text-muted">ป้อนรหัสผ่าน</small>
        </div>
        <button type="submit" class="btn btn-primary">เข้าใช้ระบบ</button>      
      </form>
    </div>
  </div>

<?php include("footer.php") ?>