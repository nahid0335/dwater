<div class="sidebar" data-color="purple" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="{{ route('welcome') }}" class="simple-text">
            H2O
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('viewer/dashboard*') ? 'active': '' }}">
                <a href="{{ route('viewer.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('viewer/customerV*') ? 'active': '' }}">
                <a href="{{ route('customerV.index') }}">
                    <i class="material-icons">edit</i>
                    <p>Profile Edit</p>
                </a>
            </li>
            <li class="{{ Request::is('viewer/history*') ? 'active': '' }}">
                <a href="{{ route('viewer.history') }}">
                    <i class="material-icons">history</i>
                    <p>History</p>
                </a>
            </li>

        </ul>
    </div>
</div>