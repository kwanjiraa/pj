<?php include("header.php") ?>
<?php include("connect.php") ?>

<div class="text-right my-4">
  <a href="room_f.php"><i class="fas fa-plus-circle fa-2x text-success"></i></a>
</div>
<?php
  $result = $link->query("select * from room order by room");
  if ($result->num_rows == 0) {
    ?>
    <div class="alert alert-warning text-center mx-auto w-50" role="alert">
      ไม่พบข้อมูลห้องประชุม
    </div>
    <?php
  } else {
  ?>
  <div class="row justify-content-center">
    <?php while ($data = $result->fetch_object()): ?>
      <div class="col col-6 col-md-4">
        <div class="card" style="width: 18rem; height: 100%">
          <img src="pic/<?php echo $data->pic?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data->room?></h5>
            <div class="card-text">
              <?php echo nl2br($data->detail) ?>
            </div>
            <div class="text-center mt-3">
              <a href="room_up1.php?i=<?php echo $data->room_id?>" class="btn btn-primary mr-3">ปรับปรุง</a>
              <a href="room_delete.php?i=<?php echo $data->room_id?>" class="del_room btn btn-danger">ลบ</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile ?>
  </div>
  <?php
  }
?>

<?php include("footer.php") ?>

<script>
  $().ready(function() {
    $('.del_room').click(function(e) {
      e.preventDefault()
      let _url = $(this).attr('href')

      $.confirm({
        title: 'ยืนยันการลบ!',
        content: 'ท่านต้องการลบห้องประชุมนี้ !',
        buttons: {
          ยืนยัน: function () {
            $.ajax({
              cache: false,
              type: 'get',
              url: _url,
              success: function(res) {
                if (res == 1) {
                  window.location = 'room.php'
                }
                else {
                  $.alert({
                    title: 'แจ้งเตือน!',
                    content: 'การลบห้องประชุมผิดพลาด!',
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