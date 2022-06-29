<?php
require_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>ToeDoe | Home</title>
</head>
<body>
<div class="topbar">
    <h1 class="align-middle">ToeDoe</h1>
</div>

<div><p>&nbsp;</p></div>

<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        + Lijst
    </button>
</div>

<div><p>&nbsp;</p></div>

<div class="container">
    <div class="row">

        <?php
        $sql = "SELECT * FROM list ORDER BY id DESC;";
        $result = mysqli_query($conn, $sql);

        foreach ($result as $list) {
            echo '
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item"><b>' . $list['title'] . '</b></li>';

            if ($list['entries'] != null) {
                $sql2 = "SELECT * FROM todo WHERE list_id=" . $list['id'] .";";
                $result2 = mysqli_query($conn, $sql2);

                foreach ($result2 as $todo) {
                    if($todo['done'] != null) {
                        echo '<li class="list-group-item green striped">' . $todo['title'] . '</li>';
                    } else {
                        echo '<li class="list-group-item">' . $todo['title'] . '
                        <form action="includes/finishtodo.inc.php" method="post">
                                <input type="hidden" name="todo" value="' . $todo['id'] . '">
                                <button name="submit" type="submit" class="btn">✓ Finish</button>
                        </form></li>
                    ';
                    }
                }
            }

            echo '
            <li class="list-group-item">
                <form action="includes/todo.inc.php" method="post">
                    <input type="text" name="title" class="text">
                    <input type="hidden" name="list" value="' . $list['id'] . '">
                    <button name="submit" type="submit" class="btn btn-primary">+</button>
                </form>
            </li>
            </ul></div>';
        };

        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lijst</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="includes/list.inc.php" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Titel</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Datum</label>
                                <input type="date" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="includes/todo.inc.php" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Titel</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>

<script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"
></script>
<script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"
></script>
<script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"
></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</html>