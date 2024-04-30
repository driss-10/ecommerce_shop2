@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div>
    <p><strong>Profil de :</strong> {{ $user->name }}</p>
    <p><strong>lastename:</strong> {{ $user->lastname }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>phone:</strong> {{ $user->phone }}</p>
    <p><strong>adresse:</strong> {{ $user->address }}</p>
    <p><strong>codePostal:</strong> {{ $user->codepostal }}</p>
    <p><strong>country:</strong> {{ $user->country }}</p>
    <p><strong>city:</strong> {{ $user->city }}</p>


    <!-- Lien pour modifier le profil -->
    <a href="{{ route('profile.edit') }}">Modifier le profil</a>
</div>


@endsection
