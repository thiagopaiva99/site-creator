<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <b>
                    {{--<img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />--}}
                </b>
                <span style="color: #fff;">
                    <i class="mdi mdi-wordpress"></i> Site Creator
                </span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('/images/users/1.jpg') }}" alt="user" class="profile-pic m-r-10" />{{ Auth::user()->name }}</a>
                </li>
            </ul>
        </div>
    </nav>
</header>