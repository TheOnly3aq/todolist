<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submit"])) {

  $todo = $_POST["todo"];

  finishTodo($conn, $todo);

} else {
    header("location: ../index.php");
    exit();
}