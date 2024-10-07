<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Clicker extends Component
{
    public $count = 1;
    public $name;
    public $email ;
    public $password ;

    public function __construct()
    {
        $this->name="Test name".rand(1000, 9999);
        $this->email="Testemail" . rand(1000, 9999) . "@gmail.com";
        $this->password="password";
    }

    public function submitHandler(){
        User::create([
            'name' =>$this->name,
            'email' => $this->email,
            'password' => Hash::make(    $this->password),
        ]);
        $this->email="Testemail" . rand(1000, 9999) . "@gmail.com";
        $this->name="Test name".rand(1000, 9999);
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
