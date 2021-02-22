<?php include("header.php") ?>
<?php include("connect.php") ?>

<div class="text-right my-4">
    <a href="dept_f.php"><i class="fas fa-plus-circle fa-2x text-success"></i></a>
</div>
<?php
    $result = $link->query("select * from dept order by dept");
    if ($result->num_rows == 0) {
        ?>
        <div class="alert alert-warning text-center mx-auto w-50" role="alert">
            ไม่พบข้อมูลแผนกหรือฝ่าย
        </div>
        <?php
    } else {
    ?>
    <table class="table table-striped">
    <thead class="text-white bg-primary">
        <tr>
            <th>#</th><th>ชื่อแผนก</th><th>จัดการแผนก</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($data = $result->fetch_object()) {
                echo "<tr>";
                echo "<td>", $data->dept_id, "</td>";
                echo "<td>", $data->dept, "</td>";
                echo 
                    "<td>
                        <a href='dept_up1.php?i=$data->dept_id'><i class='fas fa-edit text-success mr-3'></i></a> 
                        <a class='del_dept' href='dept_delete.php?i=$data->dept_id'><i class='fas fa-minus-circle text-danger'></i></a>
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

<script>
    $().ready(function() {
        $('.del_dept').click(function(e) {
            e.preventDefault()
            let _url = $(this).attr('href')

            $.confirm({
                title: 'ยืนยันการลบ!',
                content: 'ท่านต้องการลบแผนกนี้ !',
                buttons: {
                    ยืนยัน: function () {
                        $.ajax({
                            cache: false,
                            type: 'get',
                            url: _url,
                            success: function(res) {
                                if (res == 1) {
                                    window.location = 'dept.php'
                                }
                                else {
                                    $.alert({
                                        title: 'แจ้งเตือน!',
                                        content: 'การลบแผนกผิดพลาด!',
                                    });
                                }
                            }
                        })
                    },
                    ยกเลิก: function () { },
                }
            })

        })
    })
</script>