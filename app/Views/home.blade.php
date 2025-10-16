@extends('layouts.app')

@section("title" , "Home")

@section('content')
    <ul>
        <h1>{{ $message }}</h1>
        @if (count($users) > 0)
            <ul>
                @foreach ($users as $user)
                    <li>{{ $user['prenom'] }}</li>
                @endforeach
            </ul>
        
        @endif
    </ul>
@endsection
