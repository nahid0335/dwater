<div class="sidebar" data-color="purple" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="{{ route('welcome') }}" class="simple-text">
            H2O
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('admin/dashboard*') ? 'active': '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/employee*') ? 'active': '' }}">
                <a href="{{ route('employee.index') }}">
                    <i class="material-icons">contacts</i>
                    <p>Employee</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/customer*') ? 'active': '' }}">
                <a href="{{ route('customer.index') }}">
                    <i class="material-icons">face</i>
                    <p>Customer</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/reservation*') ? 'active': '' }}">
                <a href="{{ route('reservation.index') }}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact*') ? 'active': '' }}">
                <a href="{{ route('contact.index') }}">
                    <i class="material-icons">message</i>
                    <p>Contact Message</p>
                </a>
            </li>

        </ul>
    </div>
</div>