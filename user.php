<?php include("header.php") ?>
<?php include("connect.php") ?>

<?php
    if (!isset($_SESSION["ses_id"]) || $_SESSION["ses_type"] != 0) {
        die("ท่านไม่มีสิทธิ์");
    }
?>

<?php
    $result = $link->query("select u.user_id, u.name, u.email, u.status, d.dept from user u left join dept d on u.dept_id = d.dept_id where u.user_id <> 1");
    if ($result->num_rows == 0) {
        echo "ไม่มีข้อมูล";
    } else {
    ?>
    <table class="table table-striped">
    <thead class="text-white bg-primary">
        <tr>
            <th>#</th><th>ชื่อ</th><th>อีเมล</th><th>แผนก</th><th>สถานะ</th><th>อนุมัติ/ยกเลิก ผู้ใช้</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($data = $result->fetch_object()) {
                echo "<tr>";
                echo "<td>$data->user_id</td>";
                echo "<td>$data->name</td>";
                echo "<td>$data->email</td>";
                echo "<td>$data->dept</td>";
                if ($data->status == 0) {
                    echo "<td class='text-warning'>ยังไม่ได้รับการอนุมัติ</td>";
                } else {
                    echo "<td class='text-success'>ได้รับการอนุมัติแล้ว</td>";
                }
                echo "<td>
                    <a href='user_ok.php?id=$data->user_id' title='คลิก เพื่ออนุมัติ' class='mr-4'><i class='fas fa-check text-success'></i></a>
                    <a href='user_ban.php?id=$data->user_id' title='คลิก เพื่อยกเลิก'><i class='fas fa-ban text-danger'></i></a>
                </td>";
                echo "</tr>";
            }
        ?>
    </tbody>
    </table>
    <?php
    }
?>

<?php include("footer.php") ?>