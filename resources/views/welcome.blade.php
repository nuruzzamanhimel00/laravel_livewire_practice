<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        {{-- PART:1 --}}
        {{-- @livewire('clicker') --}}
        {{-- <livewire:clicker /> --}}

        {{-- Part:2  --}}
        @livewire('clicker-one')
    </body>
</html>
