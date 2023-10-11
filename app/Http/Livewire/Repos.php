<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Repos extends Component
{
    public function render()
    {
        return view('livewire.repos.index')
        ->extends("layouts.master")
        ->section("contenu");
    }
}
