function allController($scope,$http) {
	
	$http.get("../php/get_all.php").success(function(response) {$scope.all = response;});
	$http.get("../php/get_basics.php").success(function(response) {$scope.basics = response;});
	$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});
	$scope.front_img_name='Front image';
	$scope.back_img_name='Back image';
	$scope.left_img_name='Left image';
	$scope.right_img_name='Right image';
	$scope.amaga_insertar=true;

	$scope.delete=function(v) {
		   
		$http.post('../php/delete_all.php', { id: v });
		$http.get("../php/get_all.php").success(function(response) {$scope.all = response;});

	}

	$scope.update=function(v) {
		alert(" id tal"+v);
	}

	$scope.insert_all=function(){
		$scope.amaga_insertar=false;
	}

	$scope.send_all=function() {
		alert($scope.i_boughts);
		$http.post('../php/insert_users.php', { 
			cloth_id: $scope.i_cloth_id, 
			user_id: $scope.i_user_id, 
			total: $scope.i_total,
			likes: $scope.i_likes,
			img: $scope.i_img,
			boughts: $scope.i_boughts
		});
		$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});
		$scope.amaga_insertar=true;
	}

	$scope.i_image=function() {
		var reader= new FileReader();
		var image= document.getElementById('image').files[0];
	}


}