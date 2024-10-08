<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;


class UserForm extends Form
{
    #[Validate('required|min:6')]
    public $name = '';
    #[Validate('required|email|unique:users,email')]
    public $email = '' ;
    #[Validate('required|min:4')]
    public $password = '' ;
}
