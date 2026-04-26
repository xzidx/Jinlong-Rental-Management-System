<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} | DevCore</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#F8FAFC] antialiased text-slate-900">

    <aside class="fixed inset-y-0 left-0 w-64 bg-slate-900 text-slate-300 flex flex-col shadow-2xl z-50">
        
        <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-800/50">
            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                <i class="fa-solid fa-code text-xl"></i>
            </div>
            <span class="text-white font-bold text-xl tracking-tight">DevCore</span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto custom-scrollbar">
            
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mb-4">Main Menu</p>

            @php
                $navItems = [
                    ['url' => '/dashboard', 'icon' => 'fa-house', 'label' => 'Dashboard'],
                    ['url' => '/property', 'icon' => 'fa-building', 'label' => 'Properties'],
                    ['url' => '/unit', 'icon' => 'fa-door-open', 'label' => 'Units'],
                    ['url' => '/tenant', 'icon' => 'fa-users', 'label' => 'Tenants'],
                    ['url' => '/lease', 'icon' => 'fa-file-contract', 'label' => 'Leases'],
                    ['url' => '/payment', 'icon' => 'fa-credit-card', 'label' => 'Payments'],
                    ['url' => '/maintenance', 'icon' => 'fa-wrench', 'label' => 'Maintenance'],
                ];
            @endphp

            @foreach($navItems as $item)
                <a href="{{ $item['url'] }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all group {{ request()->is(ltrim($item['url'], '/').'*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-white text-slate-400' }}">
                    <i class="fa-solid {{ $item['icon'] }} w-5 text-center"></i>
                    <span class="font-medium text-sm">{{ $item['label'] }}</span>
                </a>
            @endforeach

            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mt-8 mb-4">Reports</p>
            <a href="/revenue_report" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->is('revenue_report*') ? 'bg-blue-600 text-white' : 'hover:bg-slate-800 text-slate-400' }}">
                <i class="fa-solid fa-chart-line w-5 text-center"></i>
                <span class="font-medium text-sm">Revenue</span>
            </a>

            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-[2px] px-3 mt-8 mb-4">Account</p>
            <a href="/my_profile" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->is('my_profile*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800 text-slate-400' }}">
                <i class="fa-solid fa-user-gear w-5 text-center"></i>
                <span class="font-medium text-sm">My Profile</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-900/20 hover:text-red-400 transition-all text-slate-400 mt-4">
                <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                <span class="font-medium text-sm text-red-400">Logout</span>
            </a>
        </nav>

        <div class="p-4 bg-slate-900 border-t border-slate-800/50">
            <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-800/30">
                <img src="https://ui-avatars.com/api/?name=Chan+Samnang&background=2563eb&color=fff" class="w-9 h-9 rounded-lg border border-slate-700">
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-white truncate">Chan Samnang</p>
                    <p class="text-[10px] text-slate-500 truncate font-medium">Junior Web Developer</p>
                </div>
            </div>
        </div>
    </aside>

    <main class="ml-64 min-h-screen flex flex-col">
        
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 px-8 flex items-center justify-between sticky top-0 z-40">
            <h1 class="text-xl font-extrabold text-slate-800 tracking-tight">{{ $headerTitle ?? 'Overview' }}</h1>
            
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fa-solid fa-bell"></i>
                </button>
            </div>
        </header>

        <div class="p-8">
            {{ $slot }}
        </div>
    </main>

</body>
</html>