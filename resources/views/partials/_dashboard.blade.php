<div class="container-scroller">
	<div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
	  
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">
              <span class="nav-link">Hirek</span>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="{{ route('news.index') }}">
                <span class="menu-title">Híreim</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('news.create') }}">
                <span class="menu-title">Szerkesztés</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Jegyzetek</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('notes.index') }}">
                <span class="menu-title">Jegyzeteim</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('notes.create') }}">
                <span class="menu-title">Szerkesztés</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Projektek</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('projects.index') }}">
                <span class="menu-title">Projekteim</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('projects.create') }}">
                <span class="menu-title">Szerkesztés</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Állás</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('jobs.index') }}">
                <span class="menu-title">Felhivások</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('jobs.create') }}">
                <span class="menu-title">Szerkesztés</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Kérdések</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('questions.index') }}">
                <span class="menu-title">Kérdéseim</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('questions.create') }}">
                <span class="menu-title">Szerkesztés</span>
                <i class="icon-speedometer menu-icon"></i>
              </a>
            </li>
		  </ul>
		</nav>
		
	  </div>
	</div>
</div>