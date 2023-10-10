
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Starter</title>

<link rel="stylesheet" href="public/css/app.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Inclure les fichiers CSS d'AdminLTE 3 -->
<link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">

<!-- Inclure les fichiers CSS de Chart.js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css">

</head>
<body style="background-color:#315358;"  class="hold-transition sidebar-mini">
<div class="wrapper">

<nav style="background-color:#315358;"  class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">

<h1 style="color:#FFCD00;" href="#" class="nav-link">Planning Personnel</h1>
</li>
</ul>

<ul class="navbar-nav ml-auto">

<li class="nav-item">
<a class="nav-link" data-widget="navbar-search" href="#" role="button">
<i class="fas fa-search"></i>
</a>
<div class="navbar-search-block">
<form class="form-inline">
<div class="input-group input-group-sm">
<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>
<button class="btn btn-navbar" type="button" data-widget="navbar-search">
<i class="fas fa-times"></i>
</button>
</div>
</div>
</form>
</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-comments"></i>
<span class="badge badge-danger navbar-badge">3</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<a href="#" class="dropdown-item">

<div class="media">
<img src="image/avantar.jpg"  class="img-size-50 mr-3 img-circle">
<div class="media-body">
<h3 class="dropdown-item-title">
Claude Elysé
<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">Call me whenever you can...</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>

</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">

<div class="media">
<img src="image/avantar1.jpg" class="img-size-50 img-circle mr-3">
<div class="media-body">
<h3 class="dropdown-item-title">
Fulgence Damivelo
<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">I got your message bro</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>

</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">

<div class="media">
<img src="image/avantar2.jpg" class="img-size-50 img-circle mr-3">
<div class="media-body">
<h3 class="dropdown-item-title">
NTH
<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">The subject goes here</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>

</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-bell"></i>
<span class="badge badge-warning navbar-badge">15</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-header">15 Notifications</span>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-envelope mr-2"></i> 4 new messages
<span class="float-right text-muted text-sm">3 mins</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-users mr-2"></i> 8 friend requests
<span class="float-right text-muted text-sm">12 hours</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-file mr-2"></i> 3 new reports
<span class="float-right text-muted text-sm">2 days</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="fas fa-user"></i>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<a href="#" class="dropdown-item">

<div class="media">
<img src="image/avantar.jpg"  class="img-size-50 mr-3 img-circle">
<div class="media-body">
<h3 class="dropdown-item-title">
Claude Elysé
<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
</h3>
<p><img src="image/point.svg">Activé</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>

</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">

<div class="media">
  <img src="image/para.png" class="img-size-50 img-circle mr-3">
  <div class="media-body">
    <h3 class="dropdown-item-title">
      Paramètre
      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
    </h3>
    <p class="text-sm">Tout configuration</p>
    <ul class="list-unstyled">
      <li class="text-sm text-muted">
        <i class="fas fa-user"></i> <!-- Icône de compte utilisateur -->
      
        <span>profil</span>
      </li>
      <li class="text-sm text-muted">
        <i class="fas fa-sign-out-alt"></i>
        <span>Déconnexion</span>
      </li>
    </ul>
  </div>
</div>

</nav>


<aside style="background-color:#315358;"  class="main-sidebar sidebar-dark-primary elevation-4">

<a href="index3.html" class="brand-link">
  <style>
    .center-image {
      display: flex;
      justify-content: center; /* Centrer horizontalement */
      align-items: center; /* Centrer verticalement */
      height: 10%; /* Hauteur de la vue à 100% pour centrer verticalement */
    }
    
  </style>
  <img src="image/ades.com.svg" class="center-image">
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">

<img src="image/damy.jpg" class="img-circle elevation-2">
<div class="info">
<a href="#" class="d-block">FULGENCE Damivelo</a>
</div>
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

<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<li class="nav-item menu-open">
<a href="#" class="nav-link active">
<i class="fas fa-tachometer-alt"></i>
<p>MENU<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
  <a href="#" class="nav-link active">
    <i class="fas fa-home"></i>
    <p>Acceuil</p>
  </a>
</li>
<li class="nav-item">
  <a href="conge.php" class="nav-link inactive">
    <i class="fas fa-tachometer-alt"></i> 
    <p>Congé</p>
  </a>
</li>


<li class="nav-item">
  <a href="mission.html" class="nav-link">
    <i class="fas fa-briefcase"></i>
    <p>Mission</p>
  </a>
</li>
<li class="nav-item">
  <a href="permission.html" class="nav-link">
    <i class="fas fa-user-lock"></i>
    <p>Permission</p>
  </a>
</li>
<li class="nav-item">
  <a href="repos_medical.html" class="nav-link">
    <i class="fas fa-bed"></i>
    <p>Répos médical</p>
  </a>
</li>
<li class="nav-item">
  <a href="sortie_personnel.html" class="nav-link">
    <i class="fas fa-walking"></i>
    <p>Sortie Personnel</p>
  </a>
</li>
</ul>
</nav>

</div>

</aside>
<div id="accueil" class="content-section">
<div class="card card-danger">
<div  style="background-color:#315358;text-align:center;font-weight:bold;animation: slide 5s linear infinite;" class="card-header">Statut des employées
<div  class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i  class="fas fa-minus"></i>
</button>
</div>
</div>
<style>
      .card-body{
        background-color:#FFFFFF;
      }
</style>
<div  class="card-body">
<canvas id="pieChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%; display: block; width: 334px;" width="334" height="250" class="chartjs-render-monitor"></canvas>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
$(document).ready(function() {
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');

    var data = {
        labels: ['Présent', 'Congé', 'Mission', 'Permission', 'Répos médicale', 'Sortie Personnel'],
        datasets: [{
            data: [700, 500, 400, 600, 50, 200],
            backgroundColor: ['green', 'turquoise', 'navy', 'gray', 'red', 'orange']
        }]
    };
   var myPieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            datalabels: {
                color: 'white', // Couleur du texte en blanc
                anchor: 'end', // Position des libellés
                align: 'start' // Alignement des libellés
            }
        }
    }
});

    });
</script>
</section>
<script src="public/js/app.js"></script>
</body>
</html>