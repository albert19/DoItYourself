function basicsController($scope,$http) {
	
	$http.get("../php/get_basics.php").success(function(response) {$scope.basics = response;});
	$http.get("../php/get_clothe_types.php").success(function(response) {$scope.types = response;});
	$scope.f_img_name='Front image';
	$scope.b_img_name='Back image';
	$scope.l_img_name='Left image';
	$scope.r_img_name='Right image';
	$scope.amaga_insertar=true;
	$scope.images_data= new FormData();


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


		// Enviem les dades en un POST per poder agafar-ho amb el $FILES de php.

		var xml= new XMLHttpRequest();
		xml.open('POST','../php/upload_images_basics.php',true);
		xml.send($scope.images_data);

		$http.get("../php/get_basics.php").success(function(response) {$scope.basics = response;});
		$scope.amaga_insertar=true;
	}

	$scope.i_image_front=function() {
		var images=document.getElementById('image_front').files[0];
		$scope.front_img_name=images.name;
		$scope.images_data.append('file_front',images);
		var reader = new FileReader();
		reader.onload = function() {
			$scope.lletresB=true;
			var dataURL=reader.result;
			var output=document.getElementById('load_image_front');
			output.src=dataURL;
		};
		reader.readAsDataURL(images);

	}

	$scope.i_image_back=function() {
		var images=document.getElementById('image_back').files[0];
		$scope.back_img_name=images.name;
		$scope.images_data.append('file_back',images);
		var reader = new FileReader();
		reader.onload = function() {
			$scope.lletresB=true;
			var dataURL=reader.result;
			var output=document.getElementById('load_image_back');
			output.src=dataURL;
		};
		reader.readAsDataURL(images);

	}

	$scope.i_image_left=function() {
		var images=document.getElementById('image_left').files[0];
		$scope.left_img_name=images.name;
		$scope.images_data.append('file_left',images);
		var reader = new FileReader();
		reader.onload = function() {
			$scope.lletresB=true;
			var dataURL=reader.result;
			var output=document.getElementById('load_image_left');
			output.src=dataURL;
		};
		reader.readAsDataURL(images);

	}

	$scope.i_image_right=function() {

		var images=document.getElementById('image_right').files[0];
		$scope.right_img_name=images.name;
		$scope.images_data.append('file_right',images);
		var reader = new FileReader();
		reader.onload = function() {
			$scope.lletresB=true;
			var dataURL=reader.result;
			var output=document.getElementById('load_image_right');
			output.src=dataURL;
		};
		reader.readAsDataURL(images);

	}

	$scope.puja_front=function() {
		document.getElementById('image_front').click();
		$scope.f_img_name='';

	}

	$scope.puja_back=function() {
		document.getElementById('image_back').click();
		$scope.b_img_name='';
	}

	$scope.puja_left=function() {
		document.getElementById('image_left').click();
		$scope.l_img_name='';
	}

	$scope.puja_right=function() {
		document.getElementById('image_right').click();
		$scope.r_img_name='';
	}

}