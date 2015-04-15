function basicsController($scope,$http) {
	
	$http.get("../php/get_basics.php").success(function(response) {$scope.basics = response;});
	$http.get("../php/get_clothe_types.php").success(function(response) {$scope.types = response;});
	$scope.front_img_name='Front image';
	$scope.back_img_name='Back image';
	$scope.left_img_name='Left image';
	$scope.right_img_name='Right image';
	$scope.amaga_insertar=true;

	$scope.delete=function(v) {
		$http.post('../php/delete_basics.php', { id: v });
		$http.get("../php/get_basics.php").success(function(response) {$scope.basics = response;});

	}

	$scope.update=function(v) {
		alert(v);
	}

	$scope.insert_basic=function(){
		$scope.amaga_insertar=false;
	}

	$scope.send_all=function() {
		$http.post('../php/insert_basics.php', { 
			type: $scope.i_type, 
			base_price: $scope.i_base_price, 
			color: $scope.i_color,
			img_front: $scope.front_img_name,
			img_back:$scope.back_img_name,
			img_left:$scope.left_img_name,
			img_right:$scope.right_img_name
		});
		$http.get("../php/get_basics.php").success(function(response) {$scope.basics = response;});
		$scope.amaga_insertar=true;
	}

}