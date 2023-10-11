<?php
use Illuminate\Support\Str;

function userFullName(){
    return auth()->user()->name;
}

function setMenuClass($route, $class){
    $routeActu = request()->route()->getName();
    if(contains($routeActu, $route))
    {
        return $class;
    }
    return "";
}

function setMenuActive($route){
    $routeActu = request()->route()->getName();
    if($routeActu == $route)
    {
        return "active";
    }
    return "";
}

function contains($container, $contenu){
    return Str::contains($container, $contenu);
}
