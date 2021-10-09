<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face.jpg') }}" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name"> {{ Auth::user()->name }} </p>
                    {{-- <p class="designation">Premium user</p> --}}
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Menu principal</li>
        
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="" aria-expanded="false"
                aria-controls="user-links">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Conventions de stage</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-links">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('conventions.index')}}">Mes conventions</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="">Add New Convention</a>
                    </li> --}}
                </ul>
            </div>
        </li>
    </ul>
</nav>
