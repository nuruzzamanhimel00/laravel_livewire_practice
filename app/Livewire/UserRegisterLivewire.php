<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UserRegisterLivewire extends Component
{
    use WithFileUploads, WithPagination;

    #[Validate('required|min:6')]
    public $name;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|min:4')]
    public $password;
    #[Validate('nullable|sometimes|mimes:jpeg,jpg,png,gif|max:2048')]
    public $image;

    public $grid;

    // // Constructor-like method to handle passed parameters
    public function mount($grid){

        $this->grid = $grid;
    }
    

    public function registerUserHandler(){
        $this->validate();
        $data = [];
        $data['name'] = $this->name;
        $data['password'] = $this->password;
        $data['email'] = $this->email;
        if(!is_null($this->image)){
            $data['image']  = $this->image->store('photos','public');
        }
        $user = User::create($data);
        // Flash message for success
        session()->flash('message', 'Registration successful!');
        $this->reset(['name','email','password','image']);
        //dispatch event for refresh user list of another component
        $this->dispatch('refresh-user-list',$user); 
    }

    public function reloadUserList(){
        $this->dispatch('refresh-user-list'); 
    }
    public function render()
    {
        $users = User::latest()->paginate(10);
        return view('livewire.user-register-livewire',compact('users'));
    }
}
