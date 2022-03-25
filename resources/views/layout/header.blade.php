<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <!-- Sidenav Menu Heading (Account)-->
                    <div class="sidenav-menu-heading d-sm-none">Account</div>
                    <!-- Sidenav Link (Alerts)-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="bell"></i></div>
                        Alerts
                        <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                    </a>
                    <!-- Sidenav Link (Messages)-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                        <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                    </a>
                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="nav-link-icon"><i data-feather="monitor"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link" href="#!">
                        <div class="nav-link-icon"><i class="fa-regular fa-clipboard"></i></div>
                        Orders
                    </a>

                    <a class="nav-link" href="#!">
                        <div class="nav-link-icon"><i class="fa-solid fa-truck"></i></div>
                        Fleet
                    </a>
                    
                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title">{{ auth()->user()->firstname.' '.auth()->user()->lastname }}</div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">