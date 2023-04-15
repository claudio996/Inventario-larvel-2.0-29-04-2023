<h6 class="navbar-heading text-muted">Gestion</h6>


<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link " href="{{url('/categories')}}">
            <i class="ni ni-briefcase-24 text-blue"></i> Categories
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{url('/dependences')}}">
            <i class="ni ni-briefcase-24 text-blue"></i> Dependences
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{url('/items')}}">
            <i class="fas  fa-stethoscope text-info"></i>Insumo
        </a>
    </li>

    
    <li class="nav-item">
        <a class="nav-link " href="{{url('/personal')}}">
            <i class="fas  fa-stethoscope text-info"></i>personal
        </a>
    </li>



</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->

<h6 class="navbar-heading text-muted">Prestación</h6>

<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link " href="{{url('/calendar')}}">
            <i class="ni ni-books text-default"></i> Nueva prestación

        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-sign-in-alt"></i> logout
        </a>

        <form action="{{ route('logout') }} " method="POST" style="display:none;" id="formLogout">
            @csrf

        </form>
    </li>

</ul>