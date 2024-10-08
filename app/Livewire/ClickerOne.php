<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Hash;

class ClickerOne extends Component
{
    use WithPagination;
    public UserForm $form;
    // Define validation rules


    public function submitHandler(){
        // //######### PART 01 $$$$$$$$$$$$$$$
        // $this->validate();
        // User::create([
        //     'name' =>$this->form->name,
        //     'email' => $this->form->email,
        //     'password' => Hash::make($this->form->password),
        // ]);

        // ############### PART 02 ########################
        $this->form->store();

            // Flash message for success
        session()->flash('message', 'Registration successful!');
        // $this->resetForm();
    }
    public function resetForm(){

        // Reset the form fields after successful submission
        // $this->reset(['form.name', 'form.email', 'form.password']);
        }
    public function render()
    {
        $title = "This is liveware page!!";
        $users = User::paginate(2);
        return view('livewire.clicker-one',compact('users','title'));
    }
}
