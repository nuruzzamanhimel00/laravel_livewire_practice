<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;

#[Layout('layouts.app')]
class UserPage extends Component
{
    public $userId;

    public function mount($id = null){
        $this->userId = $id;
    }
    #[Computed]
    public function user()
    {
        return User::find($this->userId);
    }
    #[Title('User Page')]
    public function render()
    {
        return view('livewire.user-page');
    }
}
