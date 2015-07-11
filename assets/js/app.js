var todoApp = angular.module('todoApp', []);

todoApp.controller('TodoCtrl', function ($scope, $http) {
	
	$http.get('api/tasks/todo').success(function(data){
		$scope.tasks = data;
	}).error(function(data){
		$scope.tasks = data;
	});
	
	$scope.refresh = function(){
		$http.get('api/tasks/todo').success(function(data){
			$scope.tasks = data;
		}).error(function(data){
			$scope.tasks = data;
		});
	}
	
	$scope.addTask = function(){
		var newTask = {title: $scope.taskTitle};
		$http.post('api/tasks/todo', newTask).success(function(data){
			$scope.refresh();
			$scope.taskTitle = '';
		}).error(function(data){
			alert(data.error);
		});
	}
	
	$scope.deleteTask = function(task){
		$http.delete('api/tasks/todo/' + task.id);
		$scope.tasks.splice($scope.tasks.indexOf(task),1);
	}
	
	$scope.updateTask = function(task){
		$http.put('api/tasks/todo', task).error(function(data){
			alert(data.error);
		});
		$scope.refresh();
	}
	
});