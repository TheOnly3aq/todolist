<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submit"])) {

  $title = $_POST["title"];
  $date = $_POST["date"];

  createList($conn, $title, $date);

} else {
    header("location: ../index.php?error");
    exit();
}