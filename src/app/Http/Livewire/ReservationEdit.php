<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReservationEdit extends Component
{
    public $reservation;
    public $date;
    public $time;
    public $number_of_people;

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }
    
    public function render()
    {
        return view('livewire.reservation-edit');
    }
}
