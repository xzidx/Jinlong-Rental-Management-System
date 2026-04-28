@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-4">
            <h2 class="text-xl font-bold text-white">New Maintenance Request</h2>
            <p class="text-blue-100 text-sm mt-1">Submit a maintenance request for your unit</p>
        </div>

        <form method="POST" action="/tenant/maintenance" class="p-6">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                <input type="text" name="title" required 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="e.g., AC not working, Leaking pipe">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                <textarea name="description" rows="4" required
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Please describe the issue in detail..."></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Priority *</label>
                <select name="priority" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="low">Low - Non urgent</option>
                    <option value="medium">Medium - Can wait a few days</option>
                    <option value="high">High - Needs attention soon</option>
                    <option value="emergency">Emergency - Immediate attention needed</option>
                </select>
            </div>

            <div class="flex gap-3 mt-6">
                <a href="/tenant/my-maintenance" class="px-4 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Submit Request</button>
            </div>
        </form>
    </div>
</div>
@endsection