<?php
	session_start();
?>
<div ng-hide="on_off()" class="popup-login-background">
	<section class="login_form">
	<img ng-click="close_popup_login()" src="img/icons/cross.png" alt="">
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
	<section class="user_zone">
		<h1 class="page_title">{{welcome_message}}</h1>
		<section class="user_grids">
			<section class="info_grid">
				<h1 class="info_title">MY INFORMATION</h1>
				<section ng-repeat="user in users | filter:filtre_info" class="data_zone">
					<section class="name_zone">
						<p class="name_title">NAME: </p>
						<p class="name_content">{{user.name}}</p>
						<img ng-click="open_name_update_zone()" src="img/icons/update_icon.png" alt="">
					</section>
					<section class="update_name_zone" ng-model="update_name_zone" ng-value="1" ng-hide="update_name_hide()" class="name_update_zone">
						<input ng-Keypress="key_input_new_name()" class="update_name_input" type="text" ng-model="us.new_name"/>
						<img ng-click="update_name(user.user_id)" src="img/icons/ok.png" alt="click it to save changes">
					</section>
					<section class="surnames_zone">
						<p class="surnames_title">SURNAMES: </p>
						<p class="surname_content">{{user.surnames}}</p>
						<img ng-click="open_surnames_update_zone()" src="img/icons/update_icon.png" alt="">
					</section>
					<section class="update_surnames_zone" ng-model="update_surnames_zone" ng-value="1" ng-hide="update_surnames_hide()" class="surnames_update_zone">
						<input ng-Keypress="key_input_new_surnames()" class="update_surnames_input" type="text" ng-model="us.new_surnames" ng-init="new_surnames='Enter your new surnames'"/>
						<img ng-click="update_surnames(user.user_id)" src="img/icons/ok.png" alt="click it to save changes">
					</section>
					<section class="email_zone2">
						<p class="email_title">EMAIL: </p>
						<p class="email_content">{{user.email}}</p>
						<img ng-click="open_email_update_zone()" src="img/icons/update_icon.png" alt="">
					</section>
					<section class="update_email_zone" ng-model="update_email_zone" ng-value="1" ng-hide="update_email_hide()" class="email_update_zone">
						<input ng-Keypress="key_input_new_email()" class="update_email_input" type="text" ng-model="us.new_email" ng-init="new_email='Enter your new email'"/>
						<img ng-click="update_email_user(user.user_id)" src="img/icons/ok.png" alt="click it to save changes">
					</section>
					<button class="password_button" ng-model="button_change_password" ng-value="1" ng-click="open_change_pass_log()" type="button">CHANGE PASSWORD</button>
					<section ng-hide="hide_change_pass_log()" class="new_password">
						<input class="old_pass_input" ng-Keypress="key_input_old_pass()" type="{{old_pass_type}}" ng-model="us.current_password"/>
						<input class="new_pass_input" ng-Keypress="key_input_new_pass()" type="{{new_pass_type}}" ng-model="us.new_password"/>
						<img class="pass_check_button" ng-click="update_password(user.user_id,user.email)" src="img/icons/ok.png" alt="click it to save changes">
						<p class="error_pass_change" ng-hide="hide_error_pass()">{{error_change_password}}</p>
					</section>
					<p class="ok_pass_change" ng-hide="hide_ok_pass()">{{ok_change_password}}</p>
				</section>
			</section>
			<section class="middle_grids">
				<section class="predesigns_zone">
					<h1 class="predesigns_title">MY PREDESIGNS</h1>
					<section class="predesign_item" ng-repeat="predesign in predesigns | filter:filtre_predesigns">
						<section class="predesign_images">
							<section class="base_image">
								<img src="img/predesigns/{{predesign.main_image}}" alt="">
							</section>
							<section class="change_images">
								<img ng-style="img_front_style(predesign.pred_id)" ng-click="change_big_image_to_front(predesign.pred_id)" src="img/predesigns/{{predesign.img_front}}" alt="">
								<img ng-style="img_back_style(predesign.pred_id)" ng-click="change_big_image_to_back(predesign.pred_id)" src="img/predesigns/{{predesign.img_back}}" alt="">
								<img ng-style="img_left_style(predesign.pred_id)" ng-click="change_big_image_to_left(predesign.pred_id)" src="img/predesigns/{{predesign.img_left}}" alt="">
								<img ng-style="img_right_style(predesign.pred_id)" ng-click="change_big_image_to_right(predesign.pred_id)" src="img/predesigns/{{predesign.img_right}}" alt="">
							</section>
						</section>
						<section class="predesign_info">
							<section class="solds_zone">
								<p class="solds_title">SOLDS:</p>
								<p class="solds_content">{{predesign.boughts}}</p>
							</section>
							<section class="votes_zone">
								<p class="votes_title">VOTES:</p>
								<p class="votes_content">{{predesign.likes}}</p>
							</section>
							<section class="predesigns_buttons_zone">
								<button ng-click="update_status_to_private(predesign.pred_id)" ng-model="privateBut" ng-style="but1style(predesign.status)" class="pred_private_button" type="button" ng-value="{{predesign.status}}">PRIVATE</button>
								<button ng-click="update_status_to_public(predesign.pred_id)" ng-model="publicBut" ng-style="but2style(predesign.status)" class="pred_public_button" type="button" ng-value="{{predesign.status}}">PUBLIC</button>
							</section>
						</section>
					</section>
				</section>
				<section class="designs_zone">
					<h1 class="designs_title">MY DESIGNS</h1>
					<section class="design_item" ng-repeat="design in designs | filter:filtre_designs">
						<section class="image_content">
							<img src="img/designs/{{design.img}}" alt="">
						</section>
						<section class="design_info">
							<section class="likes_zone">
								<p class="likes_title">LIKES:</p>
								<p class="likes_content">{{design.likes}}</p>
							</section>
							<section class="used_zone">
								<p class="used_title">USED:</p>
								<p class="used_content">{{design.used}}</p>
							</section>
							<section class="designs_buttons_zone">
								<button ng-click="update_status_to_private_design(design.design_id)" ng-style="but3style(design.status)" class="design_private_button" type="button">PRIVATE</button>
								<button ng-click="update_status_to_public_design(design.design_id)" ng-style="but4style(design.status)" class="design_public_button" type="button">PUBLIC</button>
							</section>
						</section>
					</section>
				</section>
			</section>
			<section class="puchases_zone">
				<h1 class="purchases_title">MY PURCHASE HISTORY</h1>
				<section class="purchase_item" ng-repeat="purchase in purchases | filter:filtre_purchases">
					<section class="date_zone">
						<p class="date_title">DATE:</p>
						<p class="date_content">{{purchase.date}}</p>
					</section>
					<section class="description_zone">
						<p class="description_title">DESCRIPTION:</p>
						<p class="description_content">{{purchase.description}}</p>
					</section>
					<section class="total_zone">
						<p class="total_title">TOTAL:</p>
						<p class="total_content">{{purchase.total}} $</p>
					</section>
				</section>
			</section>
		</section>
	</section>
</section>