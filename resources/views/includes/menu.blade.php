<ul class="nav pcoded-inner-navbar ">
    @foreach ($modules as $menu)
        <li class="nav-item pcoded-menu-caption">
            <label>{{$menu['name']}}</label>
        </li>
    
            @foreach ($menu['resources'] as $resource)
                <li class="nav-item">
                    <a href="{{ route($resource['resource']) }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">{{$resource['name']}}</span></a>
                </li>
            @endforeach
    @endforeach
    
    {{-- <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
    </li>

    <li class="nav-item pcoded-menu-caption">
        <label>UI Element</label>
    </li>
    <li class="nav-item pcoded-hasmenu ">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Cadastro</span></a>
        <ul class="pcoded-submenu">
            <li><a href="bc_alert.html">Clinica</a></li>
            <li><a href="bc_button.html">Hospital</a></li>
            <li><a href="{{ route('laboratorio.index') }}">Laboratório</a></li>
            <li><a href="bc_breadcrumb-pagination.html">Médico</a></li>
        </ul>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Agendamento</label>
    </li>
    <li class="nav-item">
        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Agenda</span></a>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Associados</label>
    </li>
    <li class="nav-item">
        <a href="{{ route('associados.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Associados</span></a>
    </li>

    <li class="nav-item pcoded-menu-caption">
        <label>Gerencimamento</label>
    </li>
    <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Usuários</span></a>
    </li> --}}

</ul>
