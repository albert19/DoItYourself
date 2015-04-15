function designsController($http, $scope) {
	
	$http.get("../php/get_designs.php").success(function(response) {$scope.designs = response;});
	$http.get("../php/get_users.php").success(function(response) {$scope.users = response;});
	$scope.amaga_insertar=true;
	$scope.pbuto='Load your design';

	$scope.insert_design=function(){
		$scope.amaga_insertar=false;
	}

	$scope.delete=function(v) {
		$http.post('../php/delete_designs.php', { id: v });
		$http.get("../php/get_desigsns.php").success(function(response) {$scope.designs = response;});
	}

	$scope.update=function(v) {
		alert(v);
	}

	$scope.send_all=function() {
		$http.post('../php/insert_designs.php', { 
			user_id: $scope.i_user_id, 
			image_name:$scope.image_name, 
			image_data:$scope.image_data 
		});
		$http.get("../php/get_designs.php").success(function(response) {$scope.designs = response;});
		$scope.amaga_insertar=true;
	}

	$scope.i_image=function() {
		var images=document.getElementById('image').files[0];
		$scope.image_name=images.name;
		$scope.image_data=images;
		
		var reader = new FileReader();
		reader.onload = function() {
			$scope.lletresB=true;
			var dataURL=reader.result;
			var output=document.getElementById('load_image');
			output.src=dataURL;
		};
		reader.readAsDataURL(images);

	}

	$scope.puja=function() {
		document.getElementById('image').click();
		$scope.pbuto='';
	}


}
