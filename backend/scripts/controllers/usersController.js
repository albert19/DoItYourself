function usersController($scope,$http) {
	
	$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});
	$scope.amaga_insertar=true;

	$scope.delete=function(v) {
		$http.post('../php/delete_users.php', { id: v });
		$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});
	}

	$scope.update=function(v) {
		alert(v);
	}

	$scope.insert_user=function(){
		$scope.amaga_insertar=false;
	}

	$scope.send_all=function() {
		$http.post('../php/insert_users.php', { 
			name: $scope.i_name, 
			surnames: $scope.i_surnames, 
			email: $scope.i_email,
			pass: $scope.i_pass
		});
		$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});
		$scope.amaga_insertar=true;
	}

	$scope.evalua_mail=function() {

		for (var i=0; i<$scope.users.length;i++) {

			if ($scope.users[i].email==$scope.i_email) {
				$scope.evalua={
					'background':'rgba(150,0,0,0.5)'
				}
			}

			else {
				$scope.evalua={
					'background':'rgba(0,150,0,0.5)'
				}
			}

		}
	}


}