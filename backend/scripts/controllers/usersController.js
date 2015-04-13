function usersController($scope,$http) {
	
	$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});

	$scope.delete=function(v) {
		$http.post('../php/delete_users.php', { id: v });
		$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});
	}

	$scope.update=function(v) {
		alert(v);
	}

}