<div class="card bg-success text-white mb-3">
    <div class="card-header">
        <h1> TODO FORM</h1>
    </div>
    <div class="card-body">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <form wire:submit.prevent="toDoCreate">
            <div class="form-group">
              <label for="exampleInputEmail1">Todo</label>
              <input type="text" class="form-control" id="exampleInputEmail1" wire:model="name">
              <p class="text-white">@error('name') {{ $message }} @enderror</p>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
