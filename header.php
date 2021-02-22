<?php 
  // หากยังไม่มีการสร้างตัวแปร SESSION 
  if(!isset($_SESSION)) { 
    session_start();
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css"> <!-- FontAwesome -->
    <link rel="stylesheet" href="css/jquery-confirm.css"> <!-- jQueryComfirm -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>ระบบจองห้องประชุม</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-danger" href=".">ระบบจองห้องประชุม</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              เกี่ยวกับระบบ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="about.php">เกี่ยวกับเรา</a>
              <a class="dropdown-item" href="er.php">ER-Diagram</a>
            </div>
          </li>

          <?php if (isset($_SESSION["ses_id"]) && $_SESSION["ses_type"] == 1) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ห้องประชุม
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="book.php">จองห้องประชุม</a>
              </div>
            </li>
          <?php } ?>
          <?php if (isset($_SESSION["ses_id"]) && $_SESSION["ses_type"] == 0) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                จัดการข้อมูล
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="user.php">สมาชิก</a>
                <a class="dropdown-item" href="dept.php">แผนก</a>
                <a class="dropdown-item" href="room.php">ห้องประชุม</a>
                <a class="dropdown-item" href="news_f.php">เพิ่มข่าวสาร</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="book.php">อนุมัติการจอง</a>
                <a class="dropdown-item disabled" href="#">รายงานสรุปการใช้งานห้องประชุม</a>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>

      <?php 
        if (!isset($_SESSION["ses_id"])) {
          echo "<span class='navbar-text'><a class='nav-link' href='login_f.php'>เข้าใช้งานระบบ</a></span>";
        } else {
        ?>
          <ul class="navbar-nav mr-5">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION["ses_name"] ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="self_edit.php">แก้ไขข้อมูลส่วนตัว</a>
                <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
              </div>
            </li>          
          </ul>
        <?php
        }
      ?>
    </nav>

    <div class="container my-4">
