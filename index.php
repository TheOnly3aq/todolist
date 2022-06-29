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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <title>ToeDoe | Home</title>
</head>
<body>
    <div class="topbar">
        <h1 class="align-middle">ToeDoe</h1>
    </div>
    <!-- <div class="card text-center">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
            <div>
                <input class="card-title"><?php $title ?></input>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            
        </div>
      </div> -->
          <div  class="app-container d-flex align-items-center justify-content-center flex-column"ng-app="myApp" ng-controller="myController"
          >
            {{ task_name }}
            <h3>Todo App</h3>
            <div class="d-flex align-items-center mb-3">
              <div class="form-group mr-3 mb-0">
                <input
                  ng-model="yourTask"
                  type="text"
                  class="form-control"
                  id="formGroupExampleInput"
                  placeholder="Enter a task here"
                />
              </div>
              <button
                type="button"
                class="btn btn-primary mr-3"
                ng-click="saveTask()">
                Opslaan
              </button>
            </div>
            {{ yourName }}
            <div class="table-wrapper">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Te doen</th>
                    <th>Status</th>
                    <th>Acties</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    ng-repeat="task in tasks"
                    class="{{ task.status ? 'table-success' : 'table-light' }}"
                  >
                    <td>{{ $index + 1 }}</td>
                    <td class="{{ task.status ? 'complete' : 'task' }}">
                      {{ task.task_name }}
                    </td>
                    <td>{{ task.status ? "Completed" : "In progress" }}</td>
                    <td>
                      <button class="btn btn-danger" ng-click="delete($index)">
                        Verwijderen
                      </button>
                      <button class="btn btn-success" ng-click="finished($index)">
                        Klaar
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <script>
            var app = angular.module("myApp", []);
            app.controller("myController", function($scope) {
              $scope.tasks = [];
              // $scope.saved = localStorage.getItem("tasks");
              // $scope.tasks =
              //   localStorage.getItem("tasks") !== null
              //     ? JSON.parse($scope.saved)
              //     : [
              //         { task_name: "Learn AngularJS", status: false },
              //         { task_name: "Build an Angular app", status: false }
              //       ];
              // localStorage.setItem("tasks", JSON.stringify($scope.tasks));
              $scope.saveTask = function() {
                $scope.tasks.push({ task_name: $scope.yourTask, status: false });
                //   localStorage.setItem("tasks", JSON.stringify($scope.tasks));
              };
              $scope.getTask = function() {
                var oldTasks = $scope.tasks;
                $scope.tasks = [];
                angular.forEach(oldTasks, function(task) {
                  if (!task.done) $scope.tasks.push(task);
                });
                localStorage.setItem("tasks", JSON.stringify($scope.tasks));
              };
              $scope.delete = function(i) {
                $scope.tasks.splice(i, 1);
              };
              $scope.finished = function(i) {
                $scope.tasks[i].status = true;
              };
            });
          </script>
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
        </body>
      </html>
      </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>