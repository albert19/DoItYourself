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
		$scope.password = "Enter your password";
		$scope.email = "Enter your email";
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
  			if (response[0]['status'] == "ok") {
  				$scope.on_off = function() {
					return true;
				}
				$scope.is_cookie = function() {
					return true;
				}
				$scope.is_cookie_two = function() {
					return false;
				}
				$scope.filtre_info = {
					"user_id":response[0]['id']
				};
				$scope.filtre_predesigns = {
					"user_id":response[0]['id']
				};
				$scope.filtre_designs = {
					"user_id":response[0]['id']
				};
				$scope.filtre_purchases = {
					"user_id":response[0]['id']
				};
				$scope.users = response;
  			} else {
  				$scope.error_general = "Seems that mail or password is incorrect.";
  			}
  		});
	}

	$http.get("BBDD/queries/get_user_info.php")
	.success(function(response) {
		$scope.users = response;
		$scope.filtre_info = {
			"user_id":response[0]['id']
		};
		$scope.filtre_predesigns = {
			"user_id":response[0]['id']
		};
		$scope.filtre_designs = {
			"user_id":response[0]['id']
		};
		$scope.filtre_purchases = {
			"user_id":response[0]['id']
		};
	});
	$http.get("BBDD/queries/get_predesigns.php")
	.success(function(response) {
		$scope.predesigns = response;
	});
	$http.get("BBDD/queries/get_designs.php")
	.success(function(response) {
		$scope.designs = response;
	});
	$http.get("BBDD/queries/get_purchases.php")
	.success(function(response) {
		var total_list = [];
		for (var i = 0;i < response.length;i++) {
			var check = 0;
			var str_num = response[i]['total'].toString();
			for (var j = 0;j < str_num.length;j++) {
				if (str_num[j] == ".") {
					check = 1;
				}
			}
			if (check == 0) {
				if (parseInt(str_num) <= 9) {
					str_num = "0"+str_num;
					str_num += ".00";
				} else {
					str_num += ".00";
				}
			}
			response[i]['total'] = str_num;
		}
		$scope.purchases = response;
	});

	$http.get("BBDD/queries/is_cookie.php")
  		.success(function(response) {
  			if (response[0]['status'] == "ok") {
  				$scope.is_cookie = function() {
					return true;
				}
				$scope.on_off = function() {
					return true;
				}
				$scope.is_cookie_two = function() {
					return false;
				}
				$scope.filtre_info = {
					"email":response[0]['email']
				}
				$scope.filtre_predesigns = {
					"user_id":response[0]['id']
				}
				$scope.filtre_designs = {
					"user_id":response[0]['id']
				}
				$scope.filtre_purchases = {
					"user_id":response[0]['id']
				}
				$scope.welcome_message = response[0]['name']+" ZONE";

  			} else {
  				$scope.is_cookie = function() {
					return false;
				}
				$scope.on_off = function() {
					return true;
				}
				$scope.is_cookie_two = function() {
					return true;
				}
				$scope.welcome_message = "non-user zone";
  			}
  		});

  	$scope.but1style = function(status) {
  		if (status == "PRIVATE") {
  			return {"border":"3px solid orange"};
  		}
  	}

  	$scope.but2style = function(status) {
  		if (status == "PUBLIC") {
  			return {"border":"3px solid orange"};
  		}
  	}

  	$scope.but3style = function(status) {
  		if (status == "PRIVATE") {
  			return {"border":"3px solid orange"};
  		}
  	}

  	$scope.but4style = function(status) {
  		if (status == "PUBLIC") {
  			return {"border":"3px solid orange"};
  		}
  	}

  	$scope.update_status_to_private = function(predesign_id) {
  		$http.post("BBDD/queries/update_predesign_state_to_private.php",{ pred_id : predesign_id});
  		$http.get("BBDD/queries/get_predesigns.php")
  		.success(function(response) {
  			$scope.predesigns = response;
  		});
  	}

  	$scope.update_status_to_public = function(predesign_id) {
  		$http.post("BBDD/queries/update_predesign_state_to_public.php",{ pred_id : predesign_id });
  		$http.get("BBDD/queries/get_predesigns.php")
  		.success(function(response) {
  			$scope.predesigns = response;
  		});
  	}

  	$scope.update_status_to_private_design = function(design_id) {
  		$http.post("BBDD/queries/update_design_state_to_private.php",{ design_id : design_id });
  		$http.get("BBDD/queries/get_designs.php")
  		.success(function(response) {
  			$scope.designs = response;
  		});
  	}

  	$scope.update_status_to_public_design = function(design_id) {
  		$http.post("BBDD/queries/update_design_state_to_public.php",{ design_id : design_id });
  		$http.get("BBDD/queries/get_designs.php")
  		.success(function(response) {
  			$scope.designs = response;
  		});
  	}

  	$scope.update_name_hide = function() {
  		return true;	
  	}

  	$scope.update_surnames_hide = function() {
  		return true;
  	}

  	$scope.update_email_hide = function() {
  		return true;
  	}

  	$scope.open_name_update_zone = function() {
  		if ($scope.update_name_zone == 1) {
	  		$scope.update_name_hide = function() {
		  		return false;	
		  	}
		  	$scope.update_name_zone = 2;
	  	} else {
	  		$scope.update_name_hide = function() {
		  		return true;	
		  	}
		  	$scope.update_name_zone = 1;
		  	$scope.us['new_name'] = "Enter your new name";
	  	}
  	}

  	$scope.open_surnames_update_zone = function() {
  		if ($scope.update_surnames_zone == 1) {
	  		$scope.update_surnames_hide = function() {
		  		return false;	
		  	}
		  	$scope.update_surnames_zone = 2;
	  	} else {
	  		$scope.update_surnames_hide = function() {
		  		return true;	
		  	}
		  	$scope.update_surnames_zone = 1;
		  	$scope.us['new_surnames'] = "Enter your new surnames";
	  	}
  	}

  	$scope.open_email_update_zone = function() {
  		if ($scope.update_email_zone == 1) {
	  		$scope.update_email_hide = function() {
		  		return false;	
		  	}
		  	$scope.update_email_zone = 2;
	  	} else {
	  		$scope.update_email_hide = function() {
		  		return true;	
		  	}
		  	$scope.update_email_zone = 1;
		  	$scope.us['new_email'] = "Enter your new email";
	  	}
  	}

  	$scope.us = {new_name : "Enter your new name", new_surnames : "Enter your new surnames", new_email : "Enter your new email", current_password : "Enter your current password", new_password : "Enter your new password"};

  	$scope.update_name = function(user_id) {
  		$http.post("BBDD/queries/update_name_user.php",{ user_id : user_id, new_name : $scope.us['new_name'] })
  		.success(function(response) {
  			$scope.users = response;
  		});
  		$scope.us['new_name'] = "Enter your new name";
  		$scope.update_name_hide = function() {
	  		return true;	
		}
	  	$scope.update_name_zone = 1;	
  	}

  	$scope.update_surnames = function(user_id) {
  		$http.post("BBDD/queries/update_surnames_user.php",{ user_id : user_id, new_surnames : $scope.us['new_surnames'] })
  		.success(function(response) {
  			$scope.users = response;
  		});
  		$scope.us['new_surnames'] = "Enter your new surnames";
  		$scope.update_surnames_hide = function() {
	  		return true;	
	  	}
	  	$scope.update_surnames_zone = 1;	
  	}

  	$scope.update_email_user = function(user_id) {
  		$http.post("BBDD/queries/update_email_user.php",{ user_id : user_id, new_email : $scope.us['new_email'] })
  		.success(function(response) {
  			$scope.users = response;
  		});
  		$scope.us['new_email'] = "Enter your new email";
  		$scope.update_email_hide = function() {
	  		return true;	
	  	}
	  	$scope.update_email_zone = 1;
  	}

  	$scope.hide_error_pass = function() {
  		return true;
  	}

  	$scope.hide_ok_pass = function() {
  		return true;
  	}

  	$scope.hide_change_pass_log = function() {
  		return true;
  	}

  	$scope.open_change_pass_log = function() {
  		if ($scope.button_change_password == 1) {
	  		$scope.hide_change_pass_log = function() {
		  		return false;	
		  	}
		  	$scope.button_change_password = 2;
	  	} else {
	  		$scope.hide_change_pass_log = function() {
		  		return true;	
		  	}
		  	$scope.button_change_password = 1;
		  	$scope.old_pass_type = "text";
  			$scope.new_pass_type = "text";
  			$scope.us['current_password'] = "Enter your current password";
  			$scope.us['new_password'] = "Enter your new password";
	  	}
  	}

  	$scope.update_password = function(user_id,email) {
  		$http.post("BBDD/queries/update_password_user.php",{ user_id : user_id, current_password : $scope.us['current_password'], new_password : $scope.us['new_password'] ,email : email })
  		.success(function(response){
  			if (response[0]['status'] == "ok") {
  				$http.get("BBDD/queries/get_user_info.php")
				.success(function(response) {
					$scope.users = response;
					$scope.hide_ok_pass = function() {
				  		return false;
				  	}
				  	$scope.hide_error_pass = function() {
				  		return true;
				  	}
				  	$scope.ok_change_password = "Password changed.";
				  	$scope.old_pass_type = "text";
  					$scope.new_pass_type = "text";
				  	$scope.hide_change_pass_log = function() {
				  		return true;
				  	}
				  	$scope.us['current_password'] = "Enter your current password";
				  	$scope.us['new_password'] = "Enter your new password";
				});
  			} else {
  				$scope.hide_error_pass = function() {
			  		return false;
			  	}
			  	$scope.hide_ok_pass = function() {
			  		return true;
			  	}
  				$scope.error_change_password = "Current password incorrect.";
  			}
  		});
  	}

  	$scope.old_pass_type = "text";
  	$scope.new_pass_type = "text";

  	$scope.key_input_old_pass = function() {
  		if ($scope.us['current_password'] == "Enter your current password") {
  			$scope.old_pass_type = "password";
  			$scope.us['current_password'] = "";
  		}
  	}

  	$scope.key_input_new_pass = function() {
  		if ($scope.us['new_password'] == "Enter your new password") {
  			$scope.new_pass_type = "password";
  			$scope.us['new_password'] = "";
  		}
  	}

  	

  	$scope.change_big_image_to_back = function(pred_id) {
  		$http.post("BBDD/queries/change_main_image_to_back.php",{ pred_id : pred_id })
		.success(function(response) {
			$scope.predesigns = response;
		});

		$scope.img_front_style = function(pred_id2) {
			if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_back_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'3px solid orange',
		  			'border-radius':'5px'
		  		};
	  		}
	  	}

	  	$scope.img_left_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_right_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}
  	}

  	$scope.change_big_image_to_front = function(pred_id) {
  		$http.post("BBDD/queries/change_main_image_to_front.php",{ pred_id : pred_id })
		.success(function(response) {
			$scope.predesigns = response;
		});
		$scope.img_front_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'3px solid orange',
		  			'border-radius':'5px'
		  		};
		  	}
	  	}

	  	$scope.img_back_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_left_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_right_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}
  	}

  	$scope.change_big_image_to_left = function(pred_id) {
  		$http.post("BBDD/queries/change_main_image_to_left.php",{ pred_id : pred_id })
		.success(function(response) {
			$scope.predesigns = response;
		});
		$scope.img_front_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_back_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_left_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'3px solid orange',
		  			'border-radius':'5px'
		  		};
		  	}
	  	}

	  	$scope.img_right_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}
  	}

  	$scope.change_big_image_to_right = function(pred_id) {
  		$http.post("BBDD/queries/change_main_image_to_right.php",{ pred_id : pred_id })
		.success(function(response) {
			$scope.predesigns = response;
		});
		$scope.img_front_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_back_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_left_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'none'
		  		};
		  	}
	  	}

	  	$scope.img_right_style = function(pred_id2) {
	  		if (pred_id2 == pred_id) {
		  		return {
		  			'border':'3px solid orange',
		  			'border-radius':'5px'
		  		};
		  	}
	  	}
  	}

  	$scope.key_input_new_name = function() {
  		if ($scope.us['new_name'] == "Enter your new name") {
  			$scope.us['new_name'] = "";
  		} else if ($scope.us['new_name'] == "") {
  			$scope.us['new_name'] = "Enter your new namee";
  		}
  	}

  	$scope.key_input_new_surnames = function() {
  		if ($scope.us['new_surnames'] == "Enter your new surnames") {
  			$scope.us['new_surnames'] = "";
  		} else if ($scope.us['new_surnames'] == "") {
  			$scope.us['new_surnames'] = "Enter your new surnamess";
  		}
  	}

  	$scope.key_input_new_email = function() {
  		if ($scope.us['new_email'] == "Enter your new email") {
  			$scope.us['new_email'] = "";
  		} else if ($scope.us['new_email'] == "") {
  			$scope.us['new_email'] = "Enter your new emaill"
  		}
  	}
}