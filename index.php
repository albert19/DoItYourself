<!DOCTYPE html>
<html ng-app="shop">
<head>
	<title>Do It Yourself</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles/general.css">
	<link rel="stylesheet" href="styles/menu.css">
	<link rel="stylesheet" href="styles/socials.css">
	<link rel="stylesheet" href="styles/footer.css">
</head>
<body>
	<header class="header">
		<nav class="up_content">
			<section class="socials">
				<section class="facebook_zone">
				</section>
				<section class="twitter_zone">
				</section>
				<section class="google_zone">
				</section>
			</section>
			<section class="switch">
				<p>EN</p>
				<p>ES</p>
			</section>
		</nav>
		<nav class="down_content">
			<img src="img/logo_negre.png" alt="">
			<ul class="menu">
				<li class="outside"><a href="#/">HOME</a></li>
				<li class="outside"><a href="#/about">ABOUT US</a></li>
				<li class="outside" id="dropdown">
					<a class="inner_link" href="#">PRODUCTS</a>
					<ul class="sub_menu">
						<li><a href="#/products/basics">PREDESIGNS</a></li>
						<li><a href="#/products/designs">CUSTOMIZE</a></li>
					</ul>
				</li>
				<li class="outside"><a href="#/register">REGISTER</a></li>
				<li class="outside"><a href="#/client_zone">CLIENT ZONE</a></li>
			</ul>
		</nav>
	</header>
	<section class="body" ng-view>
	</section>
	<footer>
		<section id="footer_1">
			<p>Do it Youserlf is a project powered by Luciano Chinke and Albert López
			trying to simplify the way that people buy clothes through the cloud. 
			You will find what you like or just design it in 2 steps.<br><br> Have fun ! </p>
		</section>
		<section id="footer_2">
			<ul>
				<li><a href=""> Privacy policy </a></li>
				<li><a href=""> Cookies policy </a></li>
				<li><a href=""> More information </a></li>
			</ul>
		</section>
		<section id="footer_3">
			<img src="img/mapa_navegacio.png" alt="mapa_navegacio"> 
		</section>
		<section id="llicencia">
			<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
			<img alt="Licencia de Creative Commons" style="border-width:0" 
			src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />
			<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Do it Yourself</span> by 
			<a xmlns:cc="http://creativecommons.org/ns#" href="www.doityourself.tk" property="cc:attributionName" 
			rel="cc:attributionURL">Luciano Chinke y Albert López</a> is licensed under a 
			<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
			Creative Commons Reconocimiento-NoComercial-SinObraDerivada 4.0 Internacional License</a>.
		</section>
	</footer>
	<script type="text/javascript" src="scripts/social.js"></script>
	<script type="text/javascript" src="scripts/menu.js"></script>
	<script type="text/javascript" src="scripts/controllers/homeController.js"></script>
	<script type="text/javascript" src="scripts/controllers/aboutController.js"></script>
	<script type="text/javascript" src="scripts/controllers/basicsController.js"></script>
	<script type="text/javascript" src="scripts/controllers/designsController.js"></script>
	<script type="text/javascript" src="scripts/controllers/registerController.js"></script>
	<script type="text/javascript" src="scripts/controllers/clientController.js"></script>
	<script src="scripts/angular.min.js"></script>
	<script src="scripts/angular.route.min.js"></script>
	<script>
		angular.module("shop", ["ngRoute"])
		//.controller("scripts/controllers/homeController", home)
	    .config(function($routeProvider){
	        $routeProvider
	            .when("/", {
	                controller: "scripts/controllers/homeController",
	                controllerAs: "home",
	                templateUrl: "views/home.php"
	            })
	            .when("/about", {
	                controller: "scripts/controllers/aboutController",
	                controllerAs: "about",
	                templateUrl: "views/about.php"
	            })
	            .when("/products/basics", {
	                controller: "scripts/controllers/basicsController",
	                controllerAs: "basics",
	                templateUrl: "views/basics.php"
	            })
	            .when("/products/designs", {
	                controller: "scripts/controllers/designsController",
	                controllerAs: "designs",
	                templateUrl: "views/designs.php"
	            })
	            .when("/register", {
	                controller: "scripts/controllers/registerController",
	                controllerAs: "register",
	                templateUrl: "views/register.php"
	            })
	            .when("/client_zone", {
	                controller: "scripts/controllers/clientController",
	                controllerAs: "client",
	                templateUrl: "views/client.php"
	            })
	    })  
	</script>
</body>
</html>