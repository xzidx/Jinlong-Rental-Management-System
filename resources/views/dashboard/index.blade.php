<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">

    <x-sidebar />

    <main class="ml-64 min-h-screen flex flex-col">
        
        <header class="h-20 bg-primary-bg border-b border-slate-200 px-8 flex items-center justify-between sticky top-0 z-40">
            <div>
                <h1 class="text-xl font-bold text-slate-800">Project Overview</h1>
                <p class="text-xs text-slate-500">Welcome back, check your latest updates.</p>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-slate-200 transition-all relative">
                    <i class="fa-regular fa-bell"></i>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
            </div>
        </header>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500">Active Tasks</p>
                        <h3 class="text-2xl font-bold text-slate-900">24</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>