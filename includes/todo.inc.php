<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submit"])) {

  $title = $_POST["title"];
  $list = $_POST["list"];

  createTodo($conn, $title, $list);

} else {
    header("location: ../index.php");
    exit();
}