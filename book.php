<?php include("header.php") ?>
<?php include("connect.php") ?>

<div class="text-right my-4">
  <a href="book_f.php"><i class="fas fa-plus-circle fa-2x text-success"></i></a>
</div>
<?php
    $result = $link->query("select b.book_id, b.title, b.amount,b.crete_at, b.dt_start, b.dt_end, u.user_id, u.name, r.room, b.status from book as b left join user as u on b.user_id = u.user_id left join room as r on b.room_id = r.room_id order by b.dt_start desc");
    if ($result->num_rows == 0) {
        echo "ไม่มีข้อมูล";
    } else {
    ?>
    <table class="table table-striped">
    <thead class="text-white bg-primary">
        <tr>
            <th>#</th>
            <th style="width: 100px">ชื่อ</th>
            <th>ห้องประชุม</th>
            <th>หัวเรื่อง</th>
            <th style="width: 100px">จำนวนผู้ร่วมประชุม</th>
            <th>วันเวลาเริ่มใช้ห้อง</th>
            <th>วันเวลาสิ้นสุดใช้ห้อง</th>
            <th>สถานะ</th>
            <?php if ($_SESSION["ses_type"]== 0) {
                echo "<th>ปรับสถานะ</th>";
            } ?>
        </tr>
    </thead>
    <tbody>
        <?php
            $i=1;
            while ($data = $result->fetch_object()) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$data->name</td>";
                echo "<td>$data->room</td>";
                echo "<td>$data->title</td>";
                echo "<td>$data->amount</td>";
                echo "<td>$data->dt_start</td>";
                echo "<td>$data->dt_end</td>";

                if ($data->status == 0) {
                    echo "<td class='text-danger'>ยังไม่ได้รับการอนุมัติ</td>";
                } else if ($data->status == 1){
                    echo "<td class='text-success'>ได้รับการอนุมัติแล้ว</td>";
                } else {
                  echo "<td class='text-warning'>ใช้งานห้องประชุมเรียบร้อยเเล้ว</td>";
                }
                if ($_SESSION["ses_type"]== 0) {
                echo "<td>
                    <a href='user_ok.php?id=$data->book_id' title='คลิก เพื่ออนุมัติ' class='mr-4'><i class='fas fa-check text-success'></i></a>
                    <a href='user_ban.php?id=$data->book_id' title='คลิก เพื่อยกเลิก' class='mr-4'><i class='fas fa-ban text-danger'></i></a>
                    <a href='user_ban.php?id=$data->book_id' title='คลิก เพื่อสิ้นสุดการใช้งาน'><i class='fas fa-minus text-warning'></i></a>
                </td>";
                }
                echo "</tr>";
                $i++;
            }
        ?>
    </tbody>
    </table>
    <?php
    }
?>

<?php include("footer.php") ?>