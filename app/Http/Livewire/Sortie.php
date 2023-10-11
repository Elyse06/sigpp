<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sortie extends Component
{
    public function render()
    {
        return view('livewire.sortie.index')
        ->extends("layouts.master")
        ->section("contenu");
    }
}
