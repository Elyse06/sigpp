<nav class="mt-2">

<ul class="nav nav-pills nav-sidebar">

<li class="nav-item">
<a href="{{ route('home') }}" class="nav-link {{ setMenuActive('home') }}">
<i class="nav-icon far fa-circle"></i>
<p>
Acceuil
</p>
</a>
</ul>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<li class="nav-item {{ setMenuClass('planning.', 'menu-open') }}">
<a href="#" class="nav-link {{ setMenuClass('planning.', 'active') }}">
<i class="nav-icon fas fa-tachometer-alt"></i>
<p>
Planning
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="{{ route('planning.mission') }}" class="nav-link {{ setMenuActive('planning.mission') }}">
<i class="far fa-circle nav-icon"></i>
<p>Mission</p>
</a>
</li>

<li class="nav-item">
<a href="{{ route('planning.conge') }}" class="nav-link {{ setMenuActive('planning.conge') }}">
<i class="far fa-circle nav-icon"></i>
<p>Conge</p>
</a>
</li>

<li class="nav-item">
<a href="{{ route('planning.permission') }}" class="nav-link {{ setMenuActive('planning.permission') }}">
<i class="far fa-circle nav-icon"></i>
<p>Permission</p>
</a>
</li>

<li class="nav-item">
<a href="{{ route('planning.sortie') }}" class="nav-link {{ setMenuActive('planning.sortie') }}">
<i class="far fa-circle nav-icon"></i>
<p>Sortie Personnel</p>
</a>
</li>

<li class="nav-item">
<a href="{{ route('planning.repos') }}" class="nav-link {{ setMenuActive('planning.repos') }}">
<i class="far fa-circle nav-icon"></i>
<p>Repos Medical</p>
</a>
</li>
</ul>
</li>

</ul>
</nav>