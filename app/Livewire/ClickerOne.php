<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Hash;

class ClickerOne extends Component
{
    public UserForm $form;
    // Define validation rules


    public function submitHandler(){
        // dd($this->form->all());
        $this->validate();
        User::create([
            'name' =>$this->form->name,
            'email' => $this->form->email,
            'password' => Hash::make($this->form->password),
        ]);
            // Flash message for success
        session()->flash('message', 'Registration successful!');
        $this->resetForm();
    }
    public function resetForm(){

        // Reset the form fields after successful submission
        $this->reset(['form.name', 'form.email', 'form.password']);
        }
    public function render()
    {
        $title = "This is liveware page!!";
        $users = User::get();
        return view('livewire.clicker-one',compact('users','title'));
    }
}
