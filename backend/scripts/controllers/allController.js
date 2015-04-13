function allController($scope,$http) {
	
	$http.get("../php/get_all.php").success(function(response) {$scope.all = response;});

	$scope.delete=function(v) {
		   
		$http.post('../php/delete_all.php', { id: v });
		$http.get("../php/get_all.php").success(function(response) {$scope.all = response;});

	}

	$scope.update=function(v) {
		alert(" id tal"+v);
	}


}