@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">User Management</h2>
            <p class="text-gray-500 mt-1">Manage system users and their roles</p>
        </div>
        <button class="bg-blue-600 text-white px-5 py-2 rounded-xl hover:bg-blue-700 transition-all flex items-center gap-2 shadow-sm">
            <i class="fa-solid fa-plus"></i> Add New User
        </button>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm">
            <p class="text-gray-500 text-sm">Total Users</p>
            <p class="text-2xl font-bold text-gray-800">{{ \App\Models\User::count() }}</p>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm">
            <p class="text-gray-500 text-sm">Admins</p>
            <p class="text-2xl font-bold text-blue-600">{{ \App\Models\User::where('role', 'admin')->count() }}</p>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm">
            <p class="text-gray-500 text-sm">Managers</p>
            <p class="text-2xl font-bold text-green-600">{{ \App\Models\User::where('role', 'manager')->count() }}</p>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm">
            <p class="text-gray-500 text-sm">Tenants</p>
            <p class="text-2xl font-bold text-purple-600">{{ \App\Models\User::where('role', 'tenant')->count() }}</p>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50">
            <div class="flex gap-4">
                <div class="relative flex-1">
                    <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Search users..." class="w-full pl-10 pr-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <select class="border rounded-xl px-4 py-2 bg-white">
                    <option>All Roles</option>
                    <option>Admin</option>
                    <option>Manager</option>
                    <option>Tenant</option>
                </select>
                <select class="border rounded-xl px-4 py-2 bg-white">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-600 text-sm">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Joined</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach(\App\Models\User::orderBy('created_at', 'desc')->get() as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm">#{{ $user->id }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 flex items-center justify-center text-white text-sm font-bold">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="font-medium text-gray-800">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full 
                                {{ $user->role == 'admin' ? 'bg-red-100 text-red-600' : '' }}
                                {{ $user->role == 'manager' ? 'bg-blue-100 text-blue-600' : '' }}
                                {{ $user->role == 'tenant' ? 'bg-purple-100 text-purple-600' : '' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">Active</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition-colors"><i class="fa-solid fa-edit"></i></button>
                                <button class="text-red-600 hover:bg-red-50 p-2 rounded-lg transition-colors"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t bg-gray-50 flex justify-between items-center">
            <p class="text-sm text-gray-500">Showing {{ \App\Models\User::count() }} users</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 border rounded-lg hover:bg-gray-100">Previous</button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded-lg">1</button>
                <button class="px-3 py-1 border rounded-lg hover:bg-gray-100">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
