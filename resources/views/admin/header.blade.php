<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close <i class="fa fa-close"></i></div>
                <form id="searchForm" action="#">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="What are you searching for...">
                        <button type="submit" class="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong
                            class="text-primary">Selling</strong><strong>Yard</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                </a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
            </div>
            <div class="right-menu list-inline no-margin-bottom">

                <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages"><a href="#"
                        class="dropdown-item message d-flex align-items-center">
                        <div class="profile"><img src="{{ asset('admincss/img/avatar-3.jpg') }}" alt="..."
                                class="img-fluid">
                            <div class="status online"></div>
                        </div>
                        <div class="content"> <strong class="d-block">Nadia Halsey</strong><span class="d-block">lorem
                                ipsum dolor sit amit</span><small class="date d-block">9:30am</small></div>
                    </a><a href="#" class="dropdown-item message d-flex align-items-center">
                        <div class="profile"><img src="{{ asset('admincss/img/avatar-2.jpg') }}" alt="..."
                                class="img-fluid">
                            <div class="status away"></div>
                        </div>
                        <div class="content"> <strong class="d-block">Peter Ramsy</strong><span class="d-block">lorem
                                ipsum dolor sit amit</span><small class="date d-block">7:40am</small></div>
                    </a><a href="#" class="dropdown-item message d-flex align-items-center">
                        <div class="profile"><img src="{{ asset('admincss/img/avatar-1.jpg') }}" alt="..."
                                class="img-fluid">
                            <div class="status busy"></div>
                        </div>
                        <div class="content"> <strong class="d-block">Sam Kaheil</strong><span class="d-block">lorem
                                ipsum dolor sit amit</span><small class="date d-block">6:55am</small></div>
                    </a><a href="#" class="dropdown-item message d-flex align-items-center">
                        <div class="profile"><img src="img/avatar-5.jpg" alt="..." class="img-fluid">
                            <div class="status offline"></div>
                        </div>
                        <div class="content"> <strong class="d-block">Sara Wood</strong><span class="d-block">lorem
                                ipsum dolor sit amit</span><small class="date d-block">10:30pm</small></div>
                    </a><a href="#" class="dropdown-item text-center message"> <strong>See All Messages
                            <i class="fa fa-angle-right"></i></strong></a></div>
            </div>

            <!-- Log out               -->
            <div class="list-inline-item logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <input type="submit" value="Logout">
                </form>
            </div>
        </div>
        </div>
    </nav>
</header>
