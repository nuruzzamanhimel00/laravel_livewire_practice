<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;


class UserForm extends Form
{
    // #[Validate('required|min:6')]
    public $name = '';
    // #[Validate('required|email|unique:users,email')]
    public $email = '' ;
    // #[Validate('required|min:4')]
    public $password = '' ;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4',
    ];

    public function store()
    {
        $this->validate();

        User::create([
            'name' =>$this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $this->reset(['name', 'email', 'password']);
    }
}
