<style>

    select {
        height: 38px;
        width: 342px;
        /* Largeur de tous les champs de saisie */
    }
    .form {
      display: grid;
      grid-template-columns: 240px 1fr;
      
    }

</style>


@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center"  >
        <div class="col-md-8"  style="margin-top:70px">
            <div class="card" >
                <div class="card-header"  style="background-color: #315358; color:#FFCD00;">{{ __('Nouveau compte utilisateur') }} </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form">
                            <label for="role">Rôle</label>
                            <select id="role" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="agent">Agent</option>
                                <option value="employee">Employé</option>
                            </select>
                        </div>
                        </div>
                    </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width: 150px;margin-left:100px">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
               
                </div>
                            
            </div>
        </div>
    </div>
         


@endsection
</div>
</div>