<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;

class TodoList extends Component
{
    use WithPagination;
    #[Validate('required|min:5')]
    public $name;

    public $search;

    public $editIds = [];

    public $sendingTodoID;
    public $sendingTodoName;


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

    public function editTodoHandler($todoId){
        $this->sendingTodoID = $todoId;
        $this->sendingTodoName = Todo::find($todoId)->name;

    }
    public function cancleEdit(){
        $this->reset(['sendingTodoID', 'sendingTodoName']);

    }

    public function updateEditHandler(){
        $todo = Todo::find($this->sendingTodoID);
        $todo->name = $this->sendingTodoName;
        $todo->save();
        $this->cancleEdit();
        session()->flash('message', 'To do Updated successfully!');
    }

    public function deleteTodo(Todo $todo): void{

        $todo->delete();
        session()->flash('message', 'To do Deleted successfully!');
    }
    public function toggleComplete(Todo $todo){
        $todo->completed = !$todo->completed;
        $todo->save();
        session()->flash('message', 'To do Completed successfully!');

    }

    // public function updateTodoLive()
    public function render()
    {
        $search = $this->search;

        $todos = Todo::query()
        ->when(!empty($search), function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })

        ->latest()
        ->paginate(10);



        return view('livewire.todos', compact('todos'));
    }
}
