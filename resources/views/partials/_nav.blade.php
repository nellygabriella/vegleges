
<header class="header d-flex flex-row">
	<div class="header_content d-flex flex-row align-items-center">
		<!-- Logo -->
		<div class="logo_container">
			<div class="logo">
				<img src="/images/logo.png" alt="">
				<span>MEduline</span>
			</div>
		</div>

		<!-- Main Navigation -->
		<nav class="main_nav_container">
			<div class="main_nav">
				<ul class="main_nav_list">
					<li class="main_nav_item {{Request::is('/hirek') ? "active" : ""}}"><a href="/hirek">Hírek</a></li>
					<li class="main_nav_item {{Request::is('/jegyzetek') ? "active" : ""}}"><a href="/jegyzetek">Jegyzetek</a></li>
					<li class="main_nav_item {{Request::is('/projektek') ? "active" : ""}}"><a href="/projektek">Projektek</a></li>
					<li class="main_nav_item {{Request::is('/allas') ? "active" : ""}}"><a href="/allas">Állás</a></li>
					<li class="main_nav_item {{Request::is('/forum') ? "active" : ""}}"><a href="/forum">Fórum</a></li>
					<li class="main_nav_item {{Request::is('/kapcsolat') ? "active" : ""}}"><a href="/kapcsolat">Kapcsolat</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="header_side d-flex flex-row justify-content-center align-items-center">
		
		<a href="{{ route('login') }}">Bejelentkezés</a>
	</div>

	<!-- Hamburger -->
	<div class="hamburger_container">
		<i class="fas fa-bars trans_200"></i>
	</div>

</header>

<div class="menu_container menu_mm">

	<!-- Menu Close Button -->
	<div class="menu_close_container">
		<div class="menu_close"></div>
	</div>

	<!-- Menu Items -->
	<div class="menu_inner menu_mm">
		<div class="menu menu_mm">
			<ul class="menu_list menu_mm">
				<li class="menu_item menu_mm {{Request::is('/hirek') ? "active" : ""}}"><a href="/hirek">Hírek</a></li>
				<li class="menu_item menu_mm {{Request::is('/jegyzetek') ? "active" : ""}}"><a href="/jegyzetek">Jegyzetek</a></li>"><a href="#">About us</a></li>
				<li class="menu_item menu_mm {{Request::is('/projektek') ? "active" : ""}}"><a href="/projektek">Projektek</a></li>
				<li class="menu_item menu_mm {{Request::is('/allas') ? "active" : ""}}"><a href="/allas">Állás</a></li>
				<li class="menu_item menu_mm {{Request::is('/forum') ? "active" : ""}}"><a href="/forum">Fórum</a></li>
				<li class="menu_item menu_mm{{Request::is('/kapcsolat') ? "active" : ""}}"><a href="/kapcsolat">Kapcsolat</a></li>
			</ul>

			<!-- Menu Social -->
			
			<div class="menu_social_container menu_mm">
				<ul class="menu_social menu_mm">
					<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
					<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
					<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
				</ul>
			</div>

			<div class="menu_copyright menu_mm"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright ©<script>document.write(new Date().getFullYear());</script>2018 All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
		</div>

	</div>

</div>