<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
 
<aside class="fixed inset-y-0 left-0 w-64 bg-primary-bg text-primary-black flex flex-col shadow-2xl z-50">
    
    <!-- Logo -->
    <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-800/50">
        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
            <i class="fa-solid fa-code text-xl"></i>
        </div>
        <span class="text-white font-bold text-xl tracking-tight">DevCore</span>
    </div>

    <!-- Menu -->
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        
        <p class="text-[12px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mb-4">Main Menu</p>

        <!-- Dashboard -->
        <a href="/dashboard"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('dashboard*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-house w-5 {{ request()->is('dashboard*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Dashboard</span>
        </a>

        <!-- Property -->
        <a href="/property"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('property*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-house w-5 {{ request()->is('property*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Properties</span>
        </a>

        <!-- Unit -->
        <a href="/unit"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('unit*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-brands fa-unity w-5 {{ request ()->is('unit*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Units</span>
        </a>

        <!-- Tenant -->
        <a href="/tenant"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('tenant*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-building-user w-5 {{ request()->is('tenant*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Tenants</span>
        </a>

        <!-- Lease -->
        <a href="/lease"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('lease*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-file-contract w-5 {{ request()->is('lease*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Leases</span>
        </a>

        <!-- Payment -->
        <a href="/payment"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('payment*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-credit-card w-5 {{ request()->is('payment*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Payments</span>
        </a>

        <!-- Maintenance -->
        <a href="/maintenance"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('maintenance*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-wrench w-5 {{ request()->is('maintenance*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Maintenance</span>
        </a>

        <!-- REPORTS -->
        <p class="text-[12px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mt-8 mb-4">Reports</p>

        <a href="/revenue_report"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('revenue_report*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-chart-line w-5 {{ request()->is('revenue_report*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Revenue Report</span>
        </a>

        <a href="/occupancy_report"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('occupancy_report*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-chart-pie w-5 {{ request()->is('occupancy_report*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Occupancy Report</span>
        </a>

        <a href="/maintenance_report"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('maintenance_report*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-magnifying-glass-chart w-5 {{ request()->is('maintenance_report*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Maintenance Report</span>
        </a>

        <!-- ADMIN -->
        <p class="text-[12px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mt-8 mb-4">Administration</p>

        <a href="/user_management"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('user_management*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-users-gear w-5 {{ request()->is('user_management*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">User Management</span>
        </a>

        <a href="/activity"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('activity*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-chart-line w-5 {{ request()->is('activity*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Activity Logs</span>
        </a>

        <a href="/setting"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('setting*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
            <i class="fa-solid fa-magnifying-glass-chart w-5 {{ request()->is('setting*') ? '' : 'group-hover:text-primary-bg' }}"></i>
            <span class="font-medium text-sm">Settings</span>
        </a>

        <!-- ACCOUNT -->
        <p class="text-[12px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mt-8 mb-4">Account</p>

        <a href="/my_profile"
        class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group
        {{ request()->is('my_profile*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:text-slate-200' }}">
            <i class="fa-solid fa-user-gear w-5 {{ request()->is('my_profile*') ? '' : 'group-hover:text-blue-400' }}"></i>
            <span class="font-medium text-sm">My Profile</span>
        </a>

        <!-- Logout -->
        <a href="#"
        class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-900/20 hover:text-red-400 transition-all group">
            <i class="fa-solid fa-right-from-bracket w-5"></i>
            <span class="font-medium text-sm">Logout</span>
        </a>

    </nav>

    <!-- User -->
    <div class="p-4 bg-slate-900/50 border-t border-slate-800">
        <div class="flex items-center gap-3 p-2 rounded-lg bg-slate-800/30">
            <img src="https://ui-avatars.com/api/?name=Chan+Samnang&background=0D8ABC&color=fff"
                 class="w-9 h-9 rounded-full border border-slate-700">
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-white truncate">Chan Samnang</p>
                <p class="text-[10px] text-slate-500 truncate">Web Developer</p>
            </div>
        </div>
    </div>

</aside>