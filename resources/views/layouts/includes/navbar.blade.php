<!-- navbar -->
<nav class="navbar  navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">

        <a href="#menu-toggle"class="navbar-brand ericsson-font" id="menu-toggle">
            <i class="fa fa-bars" aria-hidden="true" ></i> {{config('app.name','SOFIST')}}
        </a>

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="/">
                        <i class="fa fa-user fa-fw"></i><span class="ericsson-font">{{auth()->user()->name}} </span><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                    {{--</li>--}}

                    {{--<li class="divider"></li>--}}
                    <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>--}}
                    <li><a href="/password/reset/auth"><i class="fa fa-sign-out fa-fw"></i> Change Password</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
    </div>
</nav>
<!-- /.navbar -->