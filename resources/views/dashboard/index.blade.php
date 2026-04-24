<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Dashboard | DevCore</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-lighter font-sans antialiased text-black">

    <x-sidebar />

    <main class="ml-64 min-h-screen flex flex-col">
        
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

        <div class="p-8 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <div class="bg-white p-5 rounded-lg border-l-4 border-primary-blue-light shadow-sm">
                    <p class="text-[10px] font-bold text-text-secondary uppercase">Monthly Rent</p>
                    <h3 class="text-xl font-black text-primary-black mt-1">$1,200.00</h3>
                    <p class="text-[10px] text-success font-bold mt-2"><i class="fa-solid fa-circle-check mr-1"></i>Paid for October</p>
                </div>

                <div class="bg-white p-5 rounded-lg border-l-4 border-primary-blue-dark shadow-sm">
                    <p class="text-[10px] font-bold text-text-secondary uppercase">Lease Progress</p>
                    <h3 class="text-xl font-black text-primary-black mt-1">65 Days</h3>
                    <p class="text-[10px] text-text-secondary mt-2 italic">Until renewal window</p>
                </div>

                <div class="bg-white p-5 rounded-lg border-l-4 border-warning shadow-sm">
                    <p class="text-[10px] font-bold text-text-secondary uppercase">Active Requests</p>
                    <h3 class="text-xl font-black text-primary-black mt-1">01</h3>
                    <p class="text-[10px] text-primary-blue-light font-bold mt-2">1 Pending Action</p>
                </div>

                <button class="bg-primary-blue-light hover:bg-primary-blue-hover text-white rounded-lg p-5 shadow-md transition-all group flex flex-col justify-center">
                    <div class="flex items-center justify-between w-full">
                        <span class="text-sm font-bold">New Request</span>
                        <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </div>
                    <p class="text-[10px] opacity-80 mt-1">Report a new issue</p>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    <div class="bg-white rounded-lg border border-border-color shadow-sm overflow-hidden">
                        <div class="p-4 bg-gray-lighter/30 border-b border-border-color flex justify-between">
                            <h4 class="font-bold text-sm text-primary-blue-dark uppercase tracking-tight">Utility Usage (Current Month)</h4>
                            <i class="fa-solid fa-chart-simple text-primary-blue-light"></i>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-bold">
                                    <span>Electricity</span>
                                    <span class="text-primary-blue-light">145 kWh</span>
                                </div>
                                <div class="w-full bg-gray-lighter h-2 rounded-full overflow-hidden">
                                    <div class="bg-primary-blue-light h-full" style="width: 65%"></div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-bold">
                                    <span>Water</span>
                                    <span class="text-primary-blue-dark">12 m³</span>
                                </div>
                                <div class="w-full bg-gray-lighter h-2 rounded-full overflow-hidden">
                                    <div class="bg-primary-blue-dark h-full" style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg border border-border-color shadow-sm">
                        <div class="p-4 border-b border-border-color flex justify-between items-center">
                            <h4 class="font-bold text-sm text-primary-black">Recent Maintenance</h4>
                            <button class="text-[10px] font-bold text-primary-blue-light uppercase hover:underline">History</button>
                        </div>
                        <div class="p-0">
                            <table class="w-full text-left text-sm">
                                <thead class="bg-gray-lighter/50 text-[10px] uppercase text-text-secondary">
                                    <tr>
                                        <th class="px-6 py-3">ID</th>
                                        <th class="px-6 py-3">Description</th>
                                        <th class="px-6 py-3">Status</th>
                                        <th class="px-6 py-3">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-border-color">
                                    <tr>
                                        <td class="px-6 py-4 font-bold text-primary-blue-dark">#REQ-882</td>
                                        <td class="px-6 py-4">Leaking Kitchen Sink</td>
                                        <td class="px-6 py-4"><span class="bg-warning/10 text-warning px-2 py-1 rounded text-[10px] font-bold">IN PROGRESS</span></td>
                                        <td class="px-6 py-4 text-xs text-text-secondary">24 Apr 2026</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold text-primary-blue-dark">#REQ-710</td>
                                        <td class="px-6 py-4">AC Service</td>
                                        <td class="px-6 py-4"><span class="bg-success/10 text-success px-2 py-1 rounded text-[10px] font-bold">COMPLETED</span></td>
                                        <td class="px-6 py-4 text-xs text-text-secondary">15 Mar 2026</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    
                    <div class="bg-primary-blue-dark rounded-lg p-6 text-white shadow-xl relative overflow-hidden">
                        <div class="relative z-10">
                            <p class="text-[10px] font-bold opacity-70 uppercase mb-4">Upcoming Payment</p>
                            <h2 class="text-3xl font-black">$1,200.00</h2>
                            <p class="text-xs text-blue-200 mt-1">Due: Nov 01, 2026</p>
                            <button class="w-full mt-6 py-3 bg-primary-blue-light hover:bg-primary-blue-hover text-white font-bold rounded shadow-md transition-all">
                                <i class="fa-solid fa-wallet mr-2"></i>Pay Now
                            </button>
                            <button class="w-full mt-2 py-2 text-[10px] font-bold opacity-60 hover:opacity-100 uppercase tracking-widest">
                                Download Statement
                            </button>
                        </div>
                        <i class="fa-solid fa-shield-halved absolute -right-4 -bottom-4 text-8xl opacity-10"></i>
                    </div>

                    <div class="bg-white rounded-lg border border-border-color shadow-sm p-5">
                        <h4 class="font-bold text-xs text-primary-black uppercase tracking-widest mb-4 border-b border-border-color pb-2">Building Notices</h4>
                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <div class="mt-1"><i class="fa-solid fa-circle-info text-primary-blue-light text-xs"></i></div>
                                <div>
                                    <p class="text-xs font-bold text-primary-black leading-tight">Elevator Maintenance</p>
                                    <p class="text-[10px] text-text-secondary mt-1">Saturday, 2:00 PM - 4:00 PM. Please use North stairs.</p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="mt-1"><i class="fa-solid fa-droplet text-primary-blue-dark text-xs"></i></div>
                                <div>
                                    <p class="text-xs font-bold text-primary-black leading-tight">Water Pipe Upgrade</p>
                                    <p class="text-[10px] text-text-secondary mt-1">Water supply will be limited on April 30th.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

</body>