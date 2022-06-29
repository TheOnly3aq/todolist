<?php

function createList($conn, $title, $date) {
    $sql = "INSERT INTO list (title, date) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $title, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header ("location: ../index.php");
    exit();
}

function createTodo($conn, $title, $list) {
    $sql = "INSERT INTO todo (title, list_id) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $title, $list);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    createListEntries($conn, $list);

    header ("location: ../index.php");
    exit();
}

function createListEntries($conn, $list) {
    $sql = "UPDATE list SET entries=? WHERE id=? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    $sql_entries = "SELECT * FROM todo WHERE list_id=$list;";
    $entries = mysqli_query($conn, $sql_entries);

    mysqli_stmt_bind_param($stmt, "ss", serialize($entries), $list);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header ("location: ../index.php");
    exit();
}

function finishTodo($conn, $todo) {
    $sql = "UPDATE todo SET done=? WHERE id=? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    $done = true;

    mysqli_stmt_bind_param($stmt, "ss", $done, $todo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header ("location: ../index.php");
    exit();
}