
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<link rel="stylesheet" href="{{mix("css/app.css")}}">

@livewireStyles

</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">


{{-- pour le navigation d'en haut --}}
<x-topnav />


{{-- logo ades avec le profil utilisateurs --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="index3.html" class="brand-link">
<img src="{{asset('images/ades.png')}}"  class="brand-image img-circle" style="opacity: .8">
<span class="brand-text font-weight-light">ADES</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{{asset('images/user.png')}}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
<a href="#" class="d-block">{{Auth::user()->name}}</a>
</div>
</div>

<div class="form-inline">
<div class="input-group" data-widget="sidebar-search">
<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-sidebar">
<i class="fas fa-search fa-fw"></i>
</button>
</div>
</div>
</div>

{{-- pour les menu de navigation --}}
<x-menu />

</div>

</aside>

{{-- Container --}}

<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">

    @yield("contenu")

</div>
</div>
</div>

</div>

{{-- pour le sideber --}}
<x-sidebar />


{{-- pour le footer --}}
<x-footer />

</div>


<script src="{{mix("js/app.js")}}"></script>

@livewireScripts

</body>
</html>
