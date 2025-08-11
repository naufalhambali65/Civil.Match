<!-- NAVBAR -->
<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="/">Civil.Match</a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="/" class="nav-link @if (Request::is('/')) active @endif">Home</a></li>
                    <li><a href="/joblist" class="nav-link @if (Request::is('joblist*')) active @endif">Job List</a>
                    </li>
                    <li><a href="/jobseeker" class="nav-link @if (Request::is('jobseeker*')) active @endif">Job
                            Seeker</a></li>
                </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    @if (auth()->user())
                        <a href="/admin" class="btn btn-primary border-width-2 d-none d-lg-inline-block">Admin</a>
                        <a href="#" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="/login" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log In</a>
                    @endif
                </div>

                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                        class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>

        </div>
    </div>
</header>
