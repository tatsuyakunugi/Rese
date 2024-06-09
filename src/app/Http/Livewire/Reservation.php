<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Reservation extends Component
{
    public $shop;
    public $date;
    public $time;
    public $number_of_people;

    public function mount($shop)
    {
        $this->shop = $shop;
    }
    
    public function render()
    {
        return view('livewire.reservation');
    }
}
