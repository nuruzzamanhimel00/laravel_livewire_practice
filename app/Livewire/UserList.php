<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

#[Lazy]
class UserList extends Component
{
    use WithPagination;
    public $count;

    public $search;

    //it is a __construct() of component
    public function mount($search){
        $this->search = $search;
    }
    public function hydrate()
    {
        // Runs at the beginning of every "subsequent" request...
        // This doesn't run on the initial request ("mount" does)...
        $this->count = rand(1000,9999);
        $this->resetPage();
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

    // public function placeholder()
    // {
    //     return view('livewire.placeholder-table');
    // }

    public function searchHandler(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
        ->when(!empty($this->search), function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })

        ->paginate(10);
        $userCount = User::query()
        ->when(!empty($this->search), function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->count();
        return view('livewire.user-list',compact('users','userCount'));
    }
}
