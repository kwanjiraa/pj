<!-- <div class="row justify-content-center">
  <div class="col-12 col-md-3 pt-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
</div> -->
<?php include("connect.php") ?>
<?php
  $result = $link->query("select * from news order by title");
  if ($result->num_rows == 0) {
    ?>
    <div class="alert alert-warning text-center mx-auto w-50" role="alert">
      ไม่พบข้อมูลข่าวสาร
    </div>
    <?php
  } else {
  ?>
  <div class="row justify-content-center">
    <?php while ($data = $result->fetch_object()): ?>
      <div class="col col-12 col-md-4 pt-3">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title"><?php echo $data->title?></h5>
            <hr>
            <div class="card-text">
              <?php echo nl2br($data->detall) ?>
            </div>
            <!-- <div class="text-center mt-3">
              <a href="room_up1.php?i=<//?php echo $data->room_id?>" class="btn btn-primary mr-3">ปรับปรุง</a>
              <a href="room_delete.php?i=<//?php echo $data->room_id?>" class="del_room btn btn-danger">ลบ</a>
            </div> -->
          </div>
        </div>
      </div>
    <?php endwhile ?>
  </div>
  <?php
  }
?>
<script>
  $().ready(function() {
    $('.del_news').click(function(e) {
      e.preventDefault()
      let _url = $(this).attr('href')

      $.confirm({
        title: 'ยืนยันการลบ!',
        content: 'ท่านต้องการลบข่าวสารนี้ !',
        buttons: {
          ยืนยัน: function () {
            $.ajax({
              cache: false,
              type: 'get',
              url: _url,
              success: function(res) {
                if (res == 1) {
                  window.location = 'news.php'
                }
                else {
                  $.alert({
                    title: 'แจ้งเตือน!',
                    content: 'การลบข่าสารผิดพลาด!',
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
