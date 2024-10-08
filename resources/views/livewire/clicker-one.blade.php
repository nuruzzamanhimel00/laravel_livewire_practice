<div>
    <h1> {{$title}} </h1>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <form wire:submit="submitHandler">
        <input type="text" wire:model="form.name" />
        @error('form.name') <span class="text-red-500">{{ $message }}</span> @enderror
        <input type="email" wire:model="form.email"/>
        @error('form.email') <span class="text-red-500">{{ $message }}</span> @enderror
        <input type="password" wire:model="form.password" />
        @error('form.password') <span class="text-red-500">{{ $message }}</span> @enderror
        <button type="submit">Save</button>
    </form>
    <ul>
        @if($users->count() >0)
            @foreach($users as $user)
            <li>{{$user->name}}</li>

            @endforeach
        @endif
    </ul>
</div>
