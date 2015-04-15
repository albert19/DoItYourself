
function BackEndController($scope){

	$http.get("php/get_users.php").success(function(response) {$scope.users = response;});


	$scope.clear=function(){
		$scope.email="";
		$scope.password="";
	}

	$scope.enter=function(){
		for (var i=0;i<$scope.users;i++) {
			if (($scope.email==i['email']) && ($scope.password==i['password'])) {
				createCookie('user',i['name'],1);
				location.replace('http://localhost/Projecte/backend/views/home.html');
			} 
		}

		alert('Usuari o contrasenya incorrectes');
	}

}
