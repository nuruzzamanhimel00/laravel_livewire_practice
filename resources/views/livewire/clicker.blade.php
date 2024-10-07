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
    <form wire:submit="submitHandler">
        <input type="text" wire:model="name" />
        <input type="email" wire:model="email" />
        <input type="password" wire:model="password" />
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
