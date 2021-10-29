
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{ asset('assets/admin/img/profile_small.jpg') }}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('staff.users.logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="{{ route('staff.dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
            </li>
            <li >
                <a href=""><i class="fa fa-diamond"></i> <span class="nav-label">Products</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('staff.products.index') }}">All Products</a></li>
                    <li><a href="{{ route('staff.products.create') }}">Add Product</a></li>
                </ul>
            </li>
            <li >
                <a href=""><i class="fa fa-diamond"></i> <span class="nav-label">Categories</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('staff.categories.index') }}">All Categories</a></li>
                    <li><a href="{{ route('staff.categories.create') }}">Add Category</a></li>
                </ul>
            </li>
            <li>
                <a href=""><i class="fa fa-diamond"></i> <span class="nav-label">Brands</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('staff.brands.index') }}">All Brands</a></li>
                    <li><a href="{{ route('staff.brands.create') }}">Add Brand</a></li>
                </ul>
            </li>
            <li>
                <a href=""><i class="fa fa-diamond"></i> <span class="nav-label">Users</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('staff.users.index') }}">All Users</a></li>
                    <li><a href="{{ route('staff.users.create') }}">Add User</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('staff.customers') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Customers</span> </a>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-paper-plane"></i> <span class="nav-label">SMS </span><span class="label label-warning float-right">18</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="mailbox.html">Inbox</a></li>
                    <li><a href="mail_detail.html">Email view</a></li>
                    <li><a href="mail_compose.html">Compose email</a></li>
                    <li><a href="email_template.html">Email templates</a></li>
                </ul>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning float-right">16/24</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="mailbox.html">Inbox</a></li>
                    <li><a href="mail_detail.html">Email view</a></li>
                    <li><a href="mail_compose.html">Compose email</a></li>
                    <li><a href="email_template.html">Email templates</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
