<?php
use Illuminate\Support\Str;

// creer des constant
define("PAGELIST", "list");
define("PAGECREATFORM", "ajout");
define("PAGEEDITFORM", "edit");


// retourner le nom d'utilisateur
function userFullName(){
    return auth()->user()->name;
}

// Creer des classes
function setMenuClass($route, $class){
    $routeActu = request()->route()->getName();
    if(contains($routeActu, $route))
    {
        return $class;
    }
    return "";
}

// Activer le menu
function setMenuActive($route){
    $routeActu = request()->route()->getName();
    if($routeActu == $route)
    {
        return "active";
    }
    return "";
}

// Comparer si un contenu existe dans une container
function contains($container, $contenu){
    return Str::contains($container, $contenu);
}
