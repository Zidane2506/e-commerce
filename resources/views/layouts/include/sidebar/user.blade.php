<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('user.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.myTransaction.*') ? '' : 'collapsed' }} "
                data-bs-target="#transaction-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Transaction</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="transaction-nav"
                class="nav-content collapse {{ request()->routeIs('user.myTransaction.*') ? 'show' : '' }} "
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('user.myTransaction.index') }}"
                        class="nav-content collapse {{ request()->routeIs('user.myTransaction.*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>My Transaction</span>
                    </a>
                </li>


            </ul>
        </li>

</aside>
