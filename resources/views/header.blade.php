
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    @auth
        <a class="navbar-brand" href="{{url('/menu')}}">Mayer Dua Meal System</a>
    @else
        <a class="navbar-brand" href="{{url('/')}}">Mayer Dua Meal System</a>
   @endauth
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar" style="border: 1px solid white">
        <ul class="navbar-nav justify-content-center " style="width:100%;">
            <li class="nav-item " style="border: 1px solid white">
                @auth
                    <a class="nav-link" href="{{url('/logout')}}">{{auth()->user()->name}} - Logout</a>
                @else
                    <a class="nav-link" href="{{url('/')}}">Login/Register</a>
                @endauth
            </li>
            <li class="nav-item text-light " style="border: 1px solid white;">
                @auth
                <button class="btn" data-toggle="collapse" data-target="#openmealsystem">
                    <i class="fa fa-plus-circle text-light" aria-hidden="true" style=""></i>
                </button>
                @endauth
            </li>
        </ul>
    </div>
</nav>
<br>
