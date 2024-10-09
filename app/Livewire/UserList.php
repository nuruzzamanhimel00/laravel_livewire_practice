<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    public $count;
    public function hydrate()
    {
        // Runs at the beginning of every "subsequent" request...
        // This doesn't run on the initial request ("mount" does)...
        $this->count = rand(1000,9999);
    }
 
    public function dehydrate()
    {
        // Runs at the end of every single request...
        $this->count = rand(1000,9999);
    }

    
    #[On('refresh-user-list')] 
    public function refreshUserList($user = null){
        $this->count = rand(1000,9999);
        // dd($user);
    }
    public function render()
    {
        $users = User::latest()->paginate(5);
        $userCount = User::count();
        return view('livewire.user-list',compact('users','userCount'));
    }
}
