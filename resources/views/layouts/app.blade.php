<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Jinlong Property' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-white    font-sans antialiased">
    
    <!-- SIDEBAR -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-primary-bg text-primary-black flex flex-col shadow-2xl z-50">
        
        <!-- Logo -->
        <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-800/50">
            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                <i class="fa-solid fa-building text-xl"></i>
            </div>
            <span class="text-white font-bold text-xl tracking-tight">Jinlong Property</span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mb-4">Main Menu</p>

            @auth
                @if(Auth::user()->role == 'admin')
                    <!-- ADMIN MENU -->
                    <!-- ADMIN MENU - System Management Only -->
                    <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-house w-5"></i>
                        <span class="font-medium text-sm">Dashboard</span>
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-users-gear w-5"></i>
                        <span class="font-medium text-sm">User Management</span>
                    </a>
                    <a href="/admin/activity-logs" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-clock-rotate-left w-5"></i>
                        <span class="font-medium text-sm">Activity Logs</span>
                    </a>
                    <a href="/admin/settings" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-gear w-5"></i>
                        <span class="font-medium text-sm">Settings</span>
                    </a>
                   
                    

                @elseif(Auth::user()->role == 'manager')
                    <!-- MANAGER MENU -->
                    <a href="/manager/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-house w-5"></i>
                        <span class="font-medium text-sm">Manager Dashboard</span>
                    </a>
                    <a href="/manager/properties" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-building w-5"></i>
                        <span class="font-medium text-sm">Properties</span>
                    </a>
                    <a href="/manager/tenants" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-users w-5"></i>
                        <span class="font-medium text-sm">Tenants</span>
                    </a>
                    <a href="/manager/reports" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-chart-line w-5"></i>
                        <span class="font-medium text-sm">Reports</span>
                    </a>

                @elseif(Auth::user()->role == 'tenant')
                    <!-- TENANT MENU -->
                    <a href="/tenant/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-house w-5"></i>
                        <span class="font-medium text-sm">Dashboard</span>
                    </a>
                    <a href="/tenant/properties" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                         <i class="fa-solid fa-building w-5"></i>
                        <span class="font-medium text-sm">Properties</span>
                    </a>
                    <a href="/tenant/my-unit" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-location-dot w-5"></i>
                        <span class="font-medium text-sm">Unit</span>
                    </a>
                    <a href="/tenant/my-lease" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-file-signature w-5"></i>
                        <span class="font-medium text-sm">Lease</span>
                    </a>
                    <a href="/tenant/my-payments" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-receipt w-5"></i>
                        <span class="font-medium text-sm">Payments</span>
                    </a>
                    <a href="/tenant/my-maintenance" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                        <i class="fa-solid fa-tools w-5"></i>
                        <span class="font-medium text-sm">Maintenance</span>
                    </a>
                @endif
            @endauth

            <!-- ACCOUNT SECTION (SAME FOR ALL ROLES) -->
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mt-8 mb-4">Account</p>

            <a href="/profile" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-primary-blue-light hover:text-primary-bg">
                <i class="fa-solid fa-user-gear w-5"></i>
                <span class="font-medium text-sm">My Profile</span>
            </a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-all group hover:bg-red-900/20 hover:text-red-400">
                    <i class="fa-solid fa-right-from-bracket w-5"></i>
                    <span class="font-medium text-sm">Logout</span>
                </button>
            </form>
        </nav>

        <!-- User Info Footer -->
        <div class="p-4 bg-slate-900/50 border-t border-black">
            <div class="flex items-center gap-3 p-2 rounded-lg bg-slate-800/30">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'User' }}&background=0D8ABC&color=fff" 
                     class="w-9 h-9 rounded-full border border-slate-700">
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-white truncate">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-[10px] text-slate-500 truncate">{{ ucfirst(Auth::user()->role ?? 'Guest') }}</p>
                </div>
            </div>
        </div>
    </aside>

  <!-- MAIN CONTENT - MUST HAVE ml-64 -->
<div class="ml-64 min-h-screen bg-gray-100">
    <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center sticky top-0 z-30">
        <div>
            <h1 class="text-xl font-bold text-gray-800">{{ $pageTitle ?? 'Dashboard' }}</h1>
            <p class="text-xs text-gray-500">{{ $subTitle ?? 'Welcome back!' }}</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm text-gray-600 hidden md:block">{{ Auth::user()->name ?? 'Guest' }}</span>
            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white">
                <i class="fa-solid fa-user text-sm"></i>
            </div>
        </div>
    </header>

    <main class="p-6">
        @yield('content')
    </main>
</div>

</body>
</html>