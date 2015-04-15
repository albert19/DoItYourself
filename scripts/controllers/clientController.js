function clientController($scope,$http) {
	$scope.input_type = "text";
	$scope.focus_input_one = function() {
		$scope.first_style = function() {
			return {'background':'#EAEAEA'} 
		}
		$scope.second_style = function() {
			return {'background':'white'}
		}
	}

	$scope.focus_input_two = function() {
		$scope.second_style = function() {
			return {'background':'#EAEAEA'} 
		}
		$scope.first_style = function() {
			return {'background':'white'}
		}
	}

	$scope.key_input_one = function() {
		if ($scope.email == "Enter your email") {
			$scope.email = "";
		}
	}

	$scope.key_input_two = function() {
		if ($scope.password == "Enter your password") {
			$scope.password = "";
			$scope.input_type="password";
		}
	}

	$scope.open_popup_login = function() {
		$scope.on_off = function() {
			return false;
		}
	}

	$scope.close_popup_login = function() {
		$scope.on_off = function() {
			return true;
		}
	}

	$scope.check_email = function() {
		var regExpEmail = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
		if (regExpEmail.test($scope.email)) {
			$("#email").css("box-shadow","3px 3px 3px green");
			$scope.email_error = "";
		} else {
			$("#email").css("box-shadow","3px 3px 3px red");
			$scope.email_error = "Invalid email.";
		}
	}

	$scope.check_pass = function() {
		var regExpPass = /^.{6,100}$/;
		if (regExpPass.test($scope.password)) {
			$("#password").css("box-shadow","3px 3px 3px green");
			$scope.pass_error = "";
		} else {
			$("#password").css("box-shadow","3px 3px 3px red");
			$scope.pass_error = "password must have at least 6 chars and 20 at most.";
		}
	}

	$scope.check_data = function() {
		$http.post("BBDD/queries/login.php", { email: $scope.email, password: $scope.password })
  		.success(function(response) {
  			if (response == 1) {
  				$http.post("BBDD/queries/get_user_info.php", { email2: $scope.email })
  				.success(function(response) {
  					alert("hola");
  				});
  				$scope.on_off = function() {
					return true;
				}
				$scope.is_cookie = function() {
					return true;
				}
  			} else {
  				$scope.error_general = "Seems that mail or password is incorrect.";
  			}
  		});
	}

	//$http.get("BBDD/queries/is_cookie.php")
  	//	.success(function(response) {$scope.treballadors = response;});

	if (!readCookie("user")) {
		$scope.is_cookie = function() {
			return false;
		}
		$scope.on_off = function() {
			return true;
		}
	} else {
		$scope.is_cookie = function() {
			return true;
		}
		$scope.on_off = function() {
			return true;
		}
	}
}