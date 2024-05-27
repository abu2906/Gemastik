
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<link href="fontawesome/css/all.css" rel="stylesheet" />
    <link href="fontawesome/css/solid.css" rel="stylesheet" />
	<script src="jquery-3.7.1.js"></script>

	<title>AdminHub</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-laugh'></i>
			<span class="text">STARTiT</span>
		</a>
		<ul class="side-menu top">
			<li id="button-dashboard" class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li id="button-usaha">
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Business</span>
				</a>
			</li>
			<li id="button-analytics">
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li id="button-message">
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li id="button-trend">
				<a href="#">
					<i class='bx bx-trending-up' ></i>
					<span class="text">Trend Pasar</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li id="button-setting">
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li id="button-logout">
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="Notification.html" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile" id="button-profile">
				<img src="img/profile.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main class="main-content"></main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<!-- Popup -->
	<!-- <div class="popup" id="notificationPopup">
		<div class="popup-content">
			<span class="popup-close"><i class="fas fa-times"></i></span>
			<h2>Notication</h2>
			<p>contoh notification</p>
		</div>
	</div> -->
	
	

	<script>
		$(document).ready(function() {

			$('.main-content').load('home.html');
			
			// Button profile
			$('#button-profile').click(function(e){
				e.preventDefault();
				$('.main-content').load('profile.php');
			});

			// Button Dashboard
			$('#button-dashboard').click(function(e){
				e.preventDefault();
				$('.main-content').load('home.html');
			});

			// Button Messages
			$('#button-message').click(function(e){
				e.preventDefault();
				$('.main-content').load('message.html');
			});

			// Button usaha
			$('#button-usaha').click(function(e){
				e.preventDefault();
				$('.main-content').load('usaha.html');
			});

			// Button analytics
			$('#button-analytics').click(function(e){
				e.preventDefault();
				$('.main-content').load('analytics.html');
			});

			// Button trend
			$('#button-trend').click(function(e){
				e.preventDefault();
				$('.main-content').load('trend.html');
			});

			// Button setting
			$('#button-setting').click(function(e){
				e.preventDefault();
				$('.main-content').load('setting.html');
			});

			$('.notification').click(function(e) {
				e.preventDefault();
				$('.main-content').load('Notification.html');
			});

			// Close notification popup when close button is clicked
			$('#notificationPopup .popup-close').click(function() {
				$('#notificationPopup').fadeOut();
			});


			// Side menu
			$('#sidebar .side-menu.top li a').each(function() {
				var $item = $(this);
				var $li = $item.parent();

				$item.click(function() {
					$('#sidebar .side-menu.top li').removeClass('active');
					$li.addClass('active');
				});
			});

			// Toggle sidebar
			$('#content nav .bx.bx-menu').click(function() {
				$('#sidebar').toggleClass('hide');
			});

			// Search button
			var $searchButton = $('#content nav form .form-input button');
			var $searchButtonIcon = $('#content nav form .form-input button .bx');
			var $searchForm = $('#content nav form');

			$searchButton.click(function(e) {
				if ($(window).width() < 576) {
					e.preventDefault();
					$searchForm.toggleClass('show');
					if ($searchForm.hasClass('show')) {
						$searchButtonIcon.removeClass('bx-search').addClass('bx-x');
					} else {
						$searchButtonIcon.removeClass('bx-x').addClass('bx-search');
					}
				}
			});

			// Responsive actions
			if ($(window).width() < 768) {
				$('#sidebar').addClass('hide');
			} else if ($(window).width() > 576) {
				$searchButtonIcon.removeClass('bx-x').addClass('bx-search');
				$searchForm.removeClass('show');
			}

			$(window).resize(function() {
				if ($(this).width() > 576) {
					$searchButtonIcon.removeClass('bx-x').addClass('bx-search');
					$searchForm.removeClass('show');
				}
			});

			// Dark mode switch
			$('#switch-mode').change(function() {
				if (this.checked) {
					$('body').addClass('dark');
				} else {
					$('body').removeClass('dark');
				}
			});
});

	</script>
</body>
</html>