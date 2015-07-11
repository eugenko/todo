<!DOCTYPE html>
<html lang="en" data-ng-app="todoApp">
    <head>
        <title>Demo Todo App with CodeIgniter + AngularJS</title>
		<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url();?>assets/css/app.css" rel="stylesheet">
    </head>

    <body data-ng-controller="TodoCtrl">
        <div class="container">
            <div class="page-header">
                <h3 class="text-muted">Todo App Demo</h3>
            </div>

            <form role="form" ng-submit="addTask()">
                <div class="form-group col-md-10">
                    <input type="text" class="form-control" name="title" ng-model="taskTitle" placeholder="Enter task title" required>
                </div>
                <button type="submit" class="btn btn-default">Add task</button>
            </form>

            <table class="table table-hover">
                <tr data-ng-repeat="task in tasks track by $index">
                    <td>{{ $index + 1 }}</td>
                    <td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(tasks[$index])" ng-model="tasks[$index].title"></td>
                    <td style="text-align:center"><input class="todo" type="checkbox" ng-change="updateTask(tasks[$index])"ng-model="tasks[$index].status" ng-true-value="'1'" ng-false-value="'0'"></td>
                    <td style="text-align:center"><a class="btn btn-xs btn-default" ng-click="deleteTask(tasks[$index])"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
            </table>
        </div>

        <script src="<?=base_url();?>assets/js/jquery.js"></script>
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/js/angular.min.js"></script>
        <script src="<?=base_url();?>assets/js/app.js"></script>

    </body>
</html>