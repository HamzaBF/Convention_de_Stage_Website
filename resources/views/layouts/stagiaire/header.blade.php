<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        
        <a class="navbar-brand brand-logo" href="{{ route('stagiaire') }}">
            MAScIR
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('stagiaire') }}">
            MAScIR
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
               
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face.jpg') }}" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{{ asset('assets/images/faces/face.jpg') }}" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }} </p>
                    </div>
                    <a class="dropdown-item" href="{{ route('profile.edit',auth()->id())}}" >My Profile </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
