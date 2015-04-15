<div ng-hide="on_off()" class="popup-login-background">
	<section class="login_form">
	<img ng-click="close_popup_login()" src="img/cross.png" alt="">
		<h1>Profile entrance</h1>
		<section class="email_zone">
			<input id="email" ng-blur="check_email()" type="text" ng-style="first_style()" ng-Keypress="key_input_one()" ng-focus="focus_input_one()" ng-model="email" ng-init="email='Enter your email'"/>
			<p class="error">{{email_error}}</p>
		</section>
		<section class="password_zone">
			<input id="password" ng-blur="check_pass()" type="{{input_type}}" ng-style="second_style()" ng-Keypress="key_input_two()" ng-focus="focus_input_two()" ng-model="password" ng-init="password='Enter your password'"/>
			<p class="error">{{pass_error}}</p>
		</section>
		<section class="buttons_zone">
			<button ng-click="close_popup_login()" class="first" type="button" ng-model="cancel">CANCEL</button>
			<button ng-click="check_data()" id="second" class="second" type="button" ng-model="enter">ENTER</button>
		</section>
		<p class="error">{{error_general}}</p>
	</section>
</div>
<section ng-hide="is_cookie()" class="not_user_zone">
	<h1 class="intro_content">Oooops, you aren't a authorized user so you can't enter in the client zone. Please click the below link to login.</h1>
	<p ng-click="open_popup_login()" class="login_link">LOGIN</p>
</section>
<section ng-hide="is_cookie_two()" class="user_zone_log">
	<h1>{{benvinguda}}</h1>
</section>
