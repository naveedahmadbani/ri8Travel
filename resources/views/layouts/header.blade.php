
<body>
    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <!-- <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1> -->
                <img src="{{asset ('assets/img/logo.png')}}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/" class="nav-item nav-link {{ Request::routeIs('home') ? 'active' : ''}}">Home</a>
                    <a href="{{route('abou.us')}}" class="nav-item nav-link {{ Request::routeIs('abou.us') ? 'active' : ''}}">About </a>
                    <a href="{{route('services')}}" class="nav-item nav-link {{ Request::routeIs('services') ? 'active' : ''}}">Services</a>
                    <!-- <a href="{{route('packages')}}" class="nav-item nav-link {{ Request::routeIs('packages') ? 'active' : ''}}">Packages</a> -->
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Destination</a>
                            <a href="booking.html" class="dropdown-item">Booking</a>
                            <a href="team.html" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> -->
                    <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                </div>
                <a href="{{route('login')}}" class="btn btn-primary rounded-pill py-2 px-4-l">Login</a>
            </div>
        </nav>
    </div>