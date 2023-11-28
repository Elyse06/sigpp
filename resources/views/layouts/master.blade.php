
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
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #315358">
    <style>
        .center-image {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 60%; /* Utilisez un pourcentage pour rendre l'image responsive */
          max-width: 100%; /* Garantit que l'image ne dépasse pas la largeur du conteneur parent */
          height: auto; /* La hauteur s'ajuste automatiquement en fonction de la largeur */
        
        
        }

        </style>
 
        
        <img src="{{ asset('images/ades.png') }}" class="center-image" alt="Description de l'image" />
        




<div class="sidebar john">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <div class="image">
          <img src="{{ asset('images/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a style="color: white" href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      

{{-- pour les menu de navigation --}}
<x-menu />

</div>

</aside>

{{-- Container --}}

<div class="content-wrapper" style="background-color:#315358 ">

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
