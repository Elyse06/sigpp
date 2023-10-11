<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Conge extends Component
{
    public function render()
    {
        return view('livewire.conge.index')
        ->extends("layouts.master")
        ->section("contenu");
    }
}
