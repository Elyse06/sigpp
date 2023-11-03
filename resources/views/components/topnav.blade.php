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
    <ul class="navbar-nav ml-auto">
        {{-- notification --}}
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                    <i class="fas fa-bell"></i>
                    <span class="caret"></span>
                </a>
                <style>
                    .notification-list {
                        max-height: 300px; /* Ajustez cette valeur selon vos besoins */
                        overflow-y: auto;
                        
                    }
                </style>
                
                <div style="background-color: #315358; width: 510px;border-radius: 15px; " class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <h5 style="text-align: center;color:#FFCD00;">Notifications</h5>
                    <div class="notification-list">
                        <ul style="list-style-type: none; padding: 0;">
                            @forelse (auth()->user()->notifications as $notification)
                                <li style="display: flex; align-items: center;">
                                    <a style="color: white;" href="{{ $notification->data['url'] }}">
                                        <i style="color: green;margin-left:10px" class="fas fa-exclamation-triangle"></i>

                                        {{ $notification->data['message'] }}
                                    </a>
                                    <button class="btn btn-link" wire:click="confirmDelete()" style="margin-left: auto;">
                                        <i style="color: red" class="fas fa-times"></i>

                                    </button>
                                </li>
                            @empty
                                <li><a class="dropdown-item">No record found</a></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                
                
                
            </li>
        @endauth
        
        
        {{-- se déconnecter --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-user"></i>
            </a>
        </li>
    </ul>
</nav>


