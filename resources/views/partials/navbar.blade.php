<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo center">Teste Dev</a>
        <ul class="left hide-on-med-and-down">
            <li class="{{ request()->routeIs('clientes') ? 'active' : '' }}"><a
                    href="{{ route('clientes') }}">Clientes</a></li>
            <li class="{{ request()->routeIs('candidatos') ? 'active' : '' }}"><a
                    href="{{ route('candidatos') }}">Candidatos</a></li>
            <li class="{{ request()->routeIs('selecao') ? 'active' : '' }}"><a href="{{ route('selecao') }}">Seleção</a>
            </li>
        </ul>
    </div>
</nav>
