
    <div class="header-content d-flex flex-row align-items-center">

        <!-- Logo -->
        <div class="logo-container">
            <div class="logo">
                <img src="images/logo.png" alt="">
                <span>MEduline</span>
            </div>
        </div> 

        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-sm">
            <div class="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item {{Request::is('/news') ? "active" : ""}}"><a class="nav-link" href="/news">Hírek/Események</a></li>
                    <li class="nav-item {{Request::is('/jegyzetek') ? "active" : ""}}"><a class="nav-link" href="/jegyzetek">Jegyzetek</a></li>
                    <li class="nav-item {{Request::is('/projektek') ? "active" : ""}}"><a class="nav-link" href="/projektek">Projektek</a></li>
                    <li class="nav-item {{Request::is('/munka') ? "active" : ""}}"><a class="nav-link" href="/munka">Munkák</a></li>
                    <li class="nav-item {{Request::is('/forum') ? "active" : ""}}"><a class="nav-link" href="/forum">Kérdések</a></li>
                </ul>
            </div>
        </nav>   
        
    </div>
