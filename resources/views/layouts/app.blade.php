<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'DevCore' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
 
<body class="bg-[#F8FAFC] font-sans antialiased">
    <aside class="fixed inset-y-0 left-0 w-64 bg-primary-bg text-primary-black flex flex-col shadow-2xl z-50">
        <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-800/50">
            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                <i class="fa-solid fa-code text-xl"></i>
            </div>
            <span class="text-white font-bold text-xl tracking-tight">DevCore</span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <p class="text-[12px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mb-4">Main Menu</p>

            <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group {{ request()->is('dashboard*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
                <i class="fa-solid fa-house w-5"></i>
                <span class="font-medium text-sm">Dashboard</span>
            </a>

            <a href="/property" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group {{ request()->is('property*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
                <i class="fa-solid fa-building w-5"></i>
                <span class="font-medium text-sm">Properties</span>
            </a>

            <a href="/unit" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group {{ request()->is('unit*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
                <i class="fa-brands fa-unity w-5"></i>
                <span class="font-medium text-sm">Units</span>
            </a>

            <a href="/tenant" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group {{ request()->is('tenant*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
                <i class="fa-solid fa-building-user w-5"></i>
                <span class="font-medium text-sm">Tenants</span>
            </a>

            <p class="text-[12px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mt-8 mb-4">Reports</p>
            <a href="/revenue_report" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group {{ request()->is('revenue_report*') ? 'bg-primary-blue-light text-white shadow-md shadow-blue-600/20' : 'hover:bg-primary-blue-light hover:text-primary-bg' }}">
                <i class="fa-solid fa-chart-line w-5"></i>
                <span class="font-medium text-sm">Revenue Report</span>
            </a>

            <p class="text-[12px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mt-8 mb-4">Account</p>
            <a href="/my_profile" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group {{ request()->is('my_profile*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                <i class="fa-solid fa-user-gear w-5"></i>
                <span class="font-medium text-sm">My Profile</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-900/20 hover:text-red-400 transition-all group mt-4">
                <i class="fa-solid fa-right-from-bracket w-5"></i>
                <span class="font-medium text-sm">Logout</span>
            </a>
        </nav>

        <div class="p-4 bg-slate-900/50 border-t border-slate-800">
            <div class="flex items-center gap-3 p-2 rounded-lg bg-slate-800/30">
                <img src="https://ui-avatars.com/api/?name=Chan+Samnang&background=0D8ABC&color=fff" class="w-9 h-9 rounded-full border border-slate-700">
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-white truncate">Chan Samnang</p>
                    <p class="text-[10px] text-slate-500 truncate">Web Developer</p>
                </div>
            </div>
        </div>
    </aside>

    <div class="ml-64 flex flex-col min-h-screen">
        
        <header class="h-20 bg-white border-b border-gray-200 px-8 flex items-center justify-between sticky top-0 z-40">
            <div>
                <h1 class="text-xl font-bold text-primary-blue-dark">{{ $pageTitle ?? 'Dashboard' }}</h1>
                <p class="text-xs text-slate-400 italic">{{ $subTitle ?? 'Skyview Residences' }}</p>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-primary-black">Chan Samnang</p>
                    <p class="text-[10px] text-primary-blue-light font-bold uppercase tracking-tighter">Verified Tenant</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-primary-blue-dark flex items-center justify-center text-white shadow-lg shadow-blue-900/20">
                    <i class="fa-solid fa-user text-sm"></i>
                </div>
            </div>
        </header>

        <main class="p-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>