<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
    $result = $link->query("select * from room");
?>

<form method="post" action="book_save.php">
    <div class="form-group">
        <label for="user_id">รหัสสมาชิก</label>
        <input type="text" class="form-control" name="user_id" value="<?php echo $_SESSION['ses_id']?>" readonly>
    </div>
    <div class="form-group">
        <select class="custom-select" name="room_id" required>
            <option selected disabled>เลือกห้องประชุม</option>
            <?php while ($data = $result->fetch_object()): ?>
                <option value="<?php echo $data->room_id?>"><?php echo $data->room?></option>
            <?php endwhile ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">หัวเรื่อง</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="amount">จำนวนผู้ร่วมประชุม</label>
        <input type="number" name="amount" id="amount" class="form-control">
    </div>
    <div class="form-group">
        <label for="dt_start">วันเวลาเริ่มใช้ห้อง</label>
        <input type="datetime-local" name="dt_start" id="dt_start" class="form-control">
    </div>
    <div class="form-group">
        <label for="dt_end">วันเวลาสิ้นสุดใช้ห้อง</label>
        <input type="datetime-local" name="dt_end" id="dt_end" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">บันทึก</button>
</form>

<?php include("footer.php") ?>