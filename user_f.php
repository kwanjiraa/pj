<?php include("header.php") ?>
<?php include("connect.php") ?>
<?php
    $result = $link->query("select * from dept order by dept");
?>

<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <form action="user_add.php" method="post" class="border shadow p-3">
            <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="สำหรับเข้าสู่ระบบ" required autofocus>
            </div>
            <div class="form-group">
                <label for="name">ชื่อ-สกุล</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="ชื่อ-สกุล" required>
            </div>
            <div class="form-group">
                <label for="email">อีเมล</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="ป้อนอีเมลที่ถูกต้อง" required>
            </div>
            <div class="form-group">
                <label for="phone">โทรศัพท์</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="ป้อนโทรศัพท์" required>
            </div>
            <div class="form-group">
                <select class="custom-select" name="dept_id" required>
                    <option selected disabled>เลือกแผนกวิชา</option>
                    <?php while ($data = $result->fetch_object()): ?>
                        <option value="<?php echo $data->dept_id?>"><?php echo $data->dept?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pass">รหัสผ่าน</label>
                <input type="text" id="pass" name="pass" class="form-control" placeholder="ป้อนรหัสผ่าน" required>
            </div>

            <button type="submit" class="btn btn-success">สมัครสมาชิก</button>
        </form>
    </div>
</div>

<?php include("footer.php") ?>