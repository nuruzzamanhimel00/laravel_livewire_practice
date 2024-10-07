<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <h1>
        This is Livew Page

    </h1>
    <p>
        counter: {{ $count }}
    </p>
    <button wire:click="incrementHandler">+</button>
    <br>
    <button wire:click="decrementHandler">-</button>
    <br>
    <button wire:click="resetHandler">reset</button>
    <br>
    <h1>
        {{$title}}
    </h1>
    <p>
        User Count: {{$users->count()}}
    </p>
    <button wire:click="userCreateHandler">User Create</button>
    <h1> User list</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="submitHandler">
        <input type="text" wire:model="name" />
        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        <input type="email" wire:model="email" />
        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        <input type="password" wire:model="password" />
        @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
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
