<div class="card bg-warning text-white mb-3">
    <div class="card-header">
        <h1> TODO LIST</h1>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                Search:  <input type="text" class="form-control"
                wire:model.live.debounce.500ms="search"
                >
            </div>
        </div>
        <br>
        @if($todos->count() >0)
            @foreach($todos as $todo)
                <div class="card text-dark" wire:key="{{$todo->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div>

                                    <p class="mb-0">
                                        <input type="checkbox" {{$todo->completed == 1 ? 'checked': ''}}
                                        wire:click="toggleComplete({{ $todo }})"
                                        />
                                        {{$loop->iteration}}. {{$todo->name}} </p>
                                </div>
                                <p class="mb-0"> {{$todo->created_at}} </p>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success btn-sm"> Edit</button>
                                <button wire:click.prevent="deleteTodo({{$todo}})" class="btn btn-danger btn-sm"> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $todos->links() }}
            {{-- {{ $todos->links('vendor.livewire.bootstrap',['scrollTo' => false]) }} --}}
        </div>
        @endif
    </div>
</div>
