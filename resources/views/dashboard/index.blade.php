<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Dashboard | DevCore</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-lighter font-sans antialiased text-black">

    <x-sidebar />
<header class="h-20 bg-white border-b border-gray-light px-8 flex items-center justify-between sticky top-0 z-40">
            <div>
                <h1 class="text-xl font-bold text-primary-blue-dark">Tenant Overview</h1>
                <p class="text-xs text-text-secondary italic">Unit 402 • Skyview Residences</p>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-bold text-primary-black">Chan Samnang</p>
                    <p class="text-[10px] text-primary-blue-light font-bold uppercase">Verified Tenant</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-primary-blue-dark flex items-center justify-center text-white shadow-lg">
                    <i class="fa-solid fa-user text-sm"></i>
                </div>
            </div>
        </header>
   

</body> 