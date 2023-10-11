<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Permission extends Component
{
    public function render()
    {
        return view('livewire.permission.index')
        ->extends("layouts.master")
        ->section("contenu");
    }
}
