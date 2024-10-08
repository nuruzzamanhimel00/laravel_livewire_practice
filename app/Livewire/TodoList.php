<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\Validate;

class TodoList extends Component
{
    #[Validate('required|min:5')]
    public $name;

    public $sarch;

    public function toDoCreate(){
        //validate
        $this->validateOnly('name');
        // dd('toDoCrete');
        //create
        Todo::create([
            'name' => $this->name
        ]);
        //flash
        session()->flash('message', 'To do created successfully!');
        $this->reset(['name']);
    }
    public function render()
    {
        $todos = Todo::latest()->paginate(10);
        return view('livewire.todo-list',compact('todos'));
    }
}
