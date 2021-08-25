<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <div>
                <p class="app-sidebar__user-name">Welcome {{ Auth::user()->name }}</p>
            </div>
        </div>
        <ul class="app-menu">
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion platforms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('platforms.create') }}"><i class="icon fa fa-circle-o"></i> Ajouter une platform</a></li>
                <li><a class="treeview-item" href="{{ route('live_search.index') }}"><i class="icon fa fa-circle-o"></i> Chercher une platform</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('responsables.create') }}"><i class="icon fa fa-circle-o"></i>Ajouter un responsable</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('listePlatforms') }}"><i class="icon fa fa-circle-o"></i>Liste des platforms</a></li>
            <li><a class="treeview-item" href="{{ route('responsables.index') }}"><i class="icon fa fa-circle-o"></i>Liste des responsables</a></li>
            </ul>
            </li>
        </ul>
        <li>
            <a class="dropdown-item" style="color: rgb(49, 85, 143)" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </aside>
