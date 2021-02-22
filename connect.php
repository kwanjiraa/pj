<?php
  $link = new mysqli("localhost", "root", "123456", "pj");
  if ($link->connect_errno) {
    die("DB Error!!!");
  }
  $link->set_charset("utf8");
?>