@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">My Maintenance</h2>
    <button class="bg-blue-600 text-white px-4 py-2 rounded mb-4">Submit New Request</button>
    <table class="w-full">
        <thead class="bg-gray-100">
            <tr><th class="p-2 text-left">ID</th><th class="p-2 text-left">Title</th><th class="p-2 text-left">Status</th><th class="p-2 text-left">Date</th></tr>
        </thead>
        <tbody>
            <tr><td class="p-2">#001</td><td class="p-2">AC not working</td><td class="p-2 text-yellow-600">In Progress</td><td class="p-2">2026-04-20</td></tr>
        </tbody>
    </table>
</div>
@endsection
