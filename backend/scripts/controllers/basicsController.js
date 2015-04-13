function basicsController($scope,$http) {
	
	$http.get("../php/get_basics.php").success(function(response) {$scope.basics = response;});

	$scope.delete=function(v) {
		$http.post('../php/delete_basics.php', { id: v });
		$http.get("../php/get_basics.php").success(function(response) {$scope.basics = response;});

	}

	$scope.update=function(v) {
		alert(v);
	}


}