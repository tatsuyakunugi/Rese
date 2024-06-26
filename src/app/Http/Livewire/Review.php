<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Review extends Component
{
    public $showModal = false;
    public $reservation;
    public $rating;
    public $comment;

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }

    public function render()
    {
        return view('livewire.review');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
