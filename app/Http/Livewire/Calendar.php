<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Arr;

class Calendar extends Component
{

    public $events = [];

    public function render()
    {
        $this->events = json_encode(Event::all());
        return view('livewire.calendar')
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function eventChange($event)
    {
        $e = Event::find($event['id']);
        $e->start = $event['start'];
        if(Arr::exists($event, 'end')) {
            $e->end = $event['end'];
        }
        $e->save();
    }

    public function eventAdd($event)
    {
        Event::create($event);
    }
}
