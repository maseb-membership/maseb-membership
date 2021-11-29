
    <div class="sidebar text-sm nav-flat">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image align-middle" style="margin-top: auto; margin-bottom: auto;">
                <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" style="width:54px; height: 54px;" class="align-middle rounded-circle elevation-1">
            </div>
            <div class="info" style="display: grid;">
                <a href="{{ route('profile.show') }}" class="d-block"><strong>{{ request()->user()->fullname() }}</strong></a>
                @php

                    $user_role_names = auth()->user()->getRoleNames();
                    $display_role = "";
                    if(auth()->user()->hasRole('super-admin')){
                        $display_role = 'Super-Admin';
                    }
                    else{
                        if(auth()->user()->hasRole('system-manager')){
                            $display_role .= 'System-manager ';
                        }
                        if(auth()->user()->hasRole('finance-admin')){
                            $display_role .= 'Finance-Admin ';
                        }
                        if(auth()->user()->hasRole('membership-admin')){
                            $display_role .= 'Membership-Admin ';
                        }
                    }

                @endphp
                <small calss="align-middle text-xs" style="color: #c2c7d0;">{{ $display_role }}</small>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-child-indent nav-compact nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->



                @if (
                    auth()->user()->isSuperAdmin() ||
                    auth()->user()->isSystemManager())
                    <li class="nav-header">MANAGEMENT</li>
                    @canany(['manage-users', 'system-user'])
                    <li class="nav-item">
                        <a href="{{ route('admin.manage.user.index') }}" class="nav-link {{ request()->is('admin/manage/users*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p class="text">User Accounts</p>
                        </a>
                    </li>
                    @endcanany
                @endif
                @if (
                    auth()->user()->isSuperAdmin() ||
                    auth()->user()->isMembershipAdmin() ||
                    auth()->user()->isSystemManager())

                    <li class="nav-header">MEMBERSHIP</li>
                    {{-- @canany(['system_user']) --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-list"></i>
                            <p class="text">Members</p>
                        </a>
                    </li>
                    {{-- @endcanany --}}
                    {{-- @canany(['system_gize_channels']) --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.manage.profiles') }}" class="nav-link ">
                            <i class="nav-icon fa fa-solid fa-address-card"></i>
                            <p class="text">Profiles</p>
                        </a>
                    </li>
                    {{-- @endcanany --}}
                    @canany(['membership-request', 'membership-approve'])
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-award"></i>
                            <p class="text">Update Memberships</p>
                        </a>
                    </li>
                    @endcanany
                @endif

                @if(auth()->user()->isSuperAdmin() ||
                    auth()->user()->isSystemManager() ||
                    auth()->user()->isFinanceAdmin())
                    <li class="nav-header">FINANCE</li>
                    @canany(['manage-payment'])
                    <li class="nav-item">
                        <a href="{{ route('admin.manage.finance.index') }}" class="nav-link ">
                            <i class="nav-icon far fa-user"></i>
                            <p class="text"> Periodic Payments</p>
                        </a>
                    </li>
                    @endcanany

                @endif

                <li class="nav-header">MY ACCOUNT</li>
                <li class="nav-item">
                    <a href="{{ route('profile.show') }}" class="nav-link">
                        <i class="nav-icon far fa-id-card"></i>
                        <p class="text">My Proile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon far fa fa-sign-out-alt"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>



                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
