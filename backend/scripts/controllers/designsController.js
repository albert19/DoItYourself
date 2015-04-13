function designsController($http, $scope) {
	
	$http.get("../php/get_designs.php").success(function(response) {$scope.designs = response;});
	$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});
	$scope.amaga_insertar=true;

	$scope.insert_design=function(){
		$scope.amaga_insertar=false;
	}

	$scope.delete=function(v) {
		$http.post('../php/delete_designs.php', { id: v });
		$http.get("../php/get_designs.php").success(function(response) {$scope.designs = response;});
	}

	$scope.update=function(v) {
		alert(v);
	}

	$scope.send_all=function() {
		$http.post('../php/insert_designs.php', { user_id: $scope.i_user_id });
		$http.get("../php/get_designs.php").success(function(response) {$scope.designs = response;});
		$scope.amaga_insertar=true;
	}
}
