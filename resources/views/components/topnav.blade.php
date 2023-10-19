<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#315358">
    <ul class="navbar-nav" style="display: flex; align-items: center;"> <!-- Utilisez display: flex; pour aligner horizontalement -->
        {{-- logo manakely --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- home --}}
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link" style="color:#FFCD00; font-weight: bold; font-size: 30px;  ">Planning Personnel</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto" id="notification-list">
        {{-- notification --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger" id="notification-badge">0</span>
            </a>
        </li>
        
        {{-- se déconnecter --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-user"></i>
            </a>
        </li>
    </ul>
</nav>

<script>
    $(document).ready(function () {
        $.get('/notifications/expired-conges', function (data) {
            var notificationList = $('#notification-list');
            data.forEach(function (message) {
                notificationList.append('<li>' + message + '</li>');
            });
        });
    });
    
</script>
