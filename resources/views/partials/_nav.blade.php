
<header class="header d-flex flex-row scrolled">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="images/logo.png" alt="">
					<span>course</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
                        <li class="main_nav_item {{Request::is('/hirek') ? "active" : ""}}"><a href="/hirek">Hírek/Események</a></li>
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
			
			<span><a href="{{ route('login') }}">Bejelntkezés</a></span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
