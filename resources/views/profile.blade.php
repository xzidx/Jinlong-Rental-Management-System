@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">My Profile</h2>
    <p>Name: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    <p>Role: {{ ucfirst(Auth::user()->role) }}</p>
</div>
@endsection
