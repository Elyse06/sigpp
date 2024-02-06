<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    // Méthode pour afficher le formulaire d'inscription
public function showRegistrationForm()
{
    $employees = Employee::all();
    return view('auth.register', compact('employees'));
}

// Méthode pour traiter la demande d'inscription
public function register(Request $request)
{
    // Valider les données du formulaire
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|in:admin,agent,employee',
        'employee_id' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Créer un nouvel utilisateur
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'employee_id' => $request->input('employee_id'),
    ]);

    // Assigner le rôle à l'utilisateur en créant une relation avec le profil approprié
    $profile = \App\Models\Profile::where('type_profile', $request->input('role'))->first();
    if ($profile) {
        $user->profiles()->attach($profile->id);
    }
    

    // Rediriger l'utilisateur après l'inscription
    return redirect('/')->with('success', 'Inscription réussie');
}


}



