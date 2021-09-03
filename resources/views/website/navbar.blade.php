<nav class="main-header border-bottom-0 navbar navbar-expand-md navbar-dark navbar-gray-dark">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('assets/image/logos/logo banner dark.png') }}" alt="Gize"
                class=" brand-image pr-2" height="36px" style="opacity: 1">
            {{-- <span class="brand-text font-weight-light">Gize</span> --}}
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">{{ __('Home') }}</a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}

                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class=" dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        All
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">All</a>
                                        <a class="dropdown-item" href="#">Books</a>
                                    </div>
                                </div>
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}



            </ul>
            <!-- SEARCH FORM -->
            {{-- <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> --}}

        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">





            <!-- Messages Dropdown Menu -->
            {{-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('vendors/admin/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('vendors/admin/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('vendors/admin/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i
                                            class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li> --}}





            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li> --}}




            <!-- Dropdown Menu -->
            @auth

                <!-- Notifications Dropdown Menu -->
                @include('website.navbar-notifications-dropdown')



                <!-- User Dropdown Menu -->
                @include('website.navbar-user-dropdown')

                <!-- Language Dropdown Menu -->
                {{-- @include('website.navbar-language-dropdown') --}}

            @endauth

        </ul>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">{{ __('Log in') }}</a>
                    </li>

                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
                    </li>

                @endif
            @endguest


        </div>
    </div>
</nav>
{{-- <div class="row">
				<div class="col-sm-10 col-md-8 col-lg-9 col-xs-offset-2  pt-sm-1 pt-2 align-center bg-white" style="margin: 0 auto;">
						<div class="input-group">
								<div class="input-group-btn search-panel">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
												<span id="search_concept">All</span> <span class="caret"></span>
										</button>
										<ul class="dropdown-menu scrollable-dropdown" role="menu">
												<li><a href="#">Automotive Accesories</a></li>
												<li><a href="#">Cell Phone Accesories</a></li>
												<li><a href="#">Computer Accesories</a></li>
												<li><a href="#">Health and Personal Care</a></li>
												<li><a href="#">Automotive Accesories</a></li>
												<li><a href="#">Cell Phone Accesories</a></li>
												<li><a href="#">Computer Accesories</a></li>
												<li><a href="#">Health and Personal Care</a></li>
												<li><a href="#">Automotive Accesories</a></li>
												<li><a href="#">Cell Phone Accesories</a></li>
												<li><a href="#">Computer Accesories</a></li>
												<li><a href="#">Health and Personal Care</a></li>
												<li><a href="#">Automotive Accesories</a></li>
												<li><a href="#">Cell Phone Accesories</a></li>
												<li><a href="#">Computer Accesories</a></li>
												<li><a href="#">Health and Personal Care</a></li>
										</ul>
								</div>
								<input type="hidden" name="search_param" value="all" id="search_param">
								<input type="text" class="form-control" name="x" id="search" placeholder="Search">
								<span class="input-group-btn">
										<button class="btn btn-default" type="button">
												<span class="glyphicon glyphicon-search"></span>
												<i class="fa fa-search"></i>
										</button>
								</span>
						</div>
				</div>
		</div> --}}
