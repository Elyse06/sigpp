<aside class="control-sidebar control-sidebar-dark">

{{-- deconection --}}
<div class="bg-dark">
<div class="card-body bg-dark box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="{{asset('images/user.png')}}" alt="User profile picture">
</div>
<h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
<p class="text-muted text-center">Software Engineer</p>


<a class="btn btn-primary btn-block" href="{{ route('logout') }}"
onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
        Deconnexion
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
     @csrf
</form>

</div>

</div>

</aside>