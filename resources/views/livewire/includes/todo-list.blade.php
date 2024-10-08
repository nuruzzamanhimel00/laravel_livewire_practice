<div class="card bg-warning text-white mb-3">
    <div class="card-header">
        <h1> TODO LIST</h1>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                Search:  <input type="text" class="form-control"  aria-describedby="emailHelp">
            </div>
        </div>
        <br>
        @if($todos->count() >0)
            @foreach($todos as $todo)
                <div class="card text-dark" wire:key="{{$todo->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-0">{{$loop->iteration}}-- {{$todo->name}} </p>
                                <p class="mb-0"> {{$todo->created_at}} </p>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success btn-sm"> Edit</button>
                                <button class="btn btn-danger btn-sm"> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <!-- Pagination Links -->
        <div class="d-flex justify-content-center">

            {{ $todos->links() }}
        </div>
        @endif
    </div>
</div>
