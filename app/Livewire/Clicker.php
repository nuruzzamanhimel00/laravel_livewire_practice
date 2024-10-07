<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;

class Clicker extends Component
{
    public $count = 1;
    // #[Validate('required|min:6')]
    public $name = '';
    // #[Validate('required|email|unique:users,email')]
    public $email = '' ;
    // #[Validate('required|min:4')]
    public $password = '' ;

    // Define validation rules
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4',
    ];

    public function __construct()
    {
        // $this->name="Test name".rand(1000, 9999);
        // $this->email="Testemail" . rand(1000, 9999) . "@gmail.com";
        // $this->password="password";
    }


    public function submitHandler(){
        // dd($this->all());
        $this->validate();
        User::create([
            'name' =>$this->name,
            'email' => $this->email,
            'password' => Hash::make(    $this->password),
        ]);
            // Flash message for success
        session()->flash('message', 'Registration successful!');
        $this->resetForm();

        // $this->email="Testemail" . rand(1000, 9999) . "@gmail.com";
        // $this->name="Test name".rand(1000, 9999);
    }

    public function resetForm(){

    // Reset the form fields after successful submission
    $this->reset(['name', 'email', 'password']);
    }

    public function incrementHandler()
    {
        $this->count++;
    }

    public function decrementHandler()
    {
        $this->count--;
    }
    public function resetHandler(){
        $this->count = 0;
    }
    public function userCreateHandler(){
        User::create([
            'name' => 'User'.$this->count,
            'email' => 'user'.$this->count.rand(1000,9999).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
    public function render()
    {
        // dd($this->email);

        $title = "User Count";
        $users = User::get();
        return view('livewire.clicker',compact('users','title'));
    }
}
