<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]

class HomePage extends Component
{
    #[Title('Home Page')]
    public function render()
    {
        return view('livewire.home-page');
        // return view('livewire.home-page')
        // ->extends('components.layouts.app')
        // ->section('content'); ;
    }
}
