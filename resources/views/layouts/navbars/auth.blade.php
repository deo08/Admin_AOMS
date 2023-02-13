<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="" class="simple-text logo-normal">
            {{ __('AOMS') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">

            {{-- Dashboard --}}
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            {{-- Category --}}
            <li class="{{ $elementActive == 'list' ? 'active' : '' }}">
                <a href="{{ route('list', 'category') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Category') }}</p>
                </a>
            </li>

            {{-- Manage Product/Item --}}
            <li class="{{ $elementActive == 'user' || $elementActive == 'inventory' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#inventory">
                    {{-- <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i> --}}
                    <p>
                        <i class="nc-icon nc-app"></i>
                            {{ __('Product Inventory') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="inventory">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'inventory' ? 'active' : '' }}">
                            <a href="{{ route('inventory-list') }}">
                                <span class="sidebar-mini-icon">IL</span>
                                <span class="sidebar-normal">{{ __(' Inventory List ') }}</span>
                            </a>
                        </li>
                        {{-- <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('dashboard', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>

            {{-- Customer --}}
            <li class="{{ $elementActive == 'customer' ? 'active' : '' }}">
                <a href="{{ route('customer-list', 'customer') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('Customer List') }}</p>
                </a>
            </li>

            {{-- Settings --}}
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    {{-- <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i> --}}
                    <p>
                        <i class="nc-icon nc-settings-gear-65"></i>
                            {{ __('Settings') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">AP</span>
                                <span class="sidebar-normal">{{ __(' Admin Profile ') }}</span>
                            </a>
                        </li>
                        {{-- <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('dashboard', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>


            {{-- <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('dashboard', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('dashboard', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('dashboard', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('dashboard', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('dashboard', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li> --}}
            {{-- <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                <a href="{{ route('dashboard', 'upgrade') }}" class="bg-danger">
                    <i class="nc-icon nc-spaceship text-white"></i>
                    <p class="text-white">{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}

            {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/profile*')?'active':''}}">
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                >
                    <i class="nc-icon nc-settings-gear-65"></i>
                    <span
                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Expenses</span>
                    </a>
                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                    style="display: {{Request::is('admin/expense*')?'block':'none'}}">
                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin/profile/edit')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                                href="{{route('profile.edit')}}"
                                >
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    Expense Category
                                </span>
                            </a>
                        </li>
                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/profile/edit')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{route('profile.edit')}}"
                            >
                            <span class="tio-circle nav-indicator-icon"></span>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Expenses List
                            </span>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
