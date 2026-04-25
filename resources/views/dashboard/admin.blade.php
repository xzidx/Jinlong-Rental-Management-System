<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | DevCore</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-lighter font-sans antialiased text-black">

    <x-sidebar />

    <main class="ml-64 min-h-screen flex flex-col">
        
        <header class="h-20 bg-white border-b border-gray-light px-8 flex items-center justify-between sticky top-0 z-40">
            <div>
                <h1 class="text-xl font-bold text-primary-blue-dark">System Administration</h1>
                <p class="text-xs text-text-secondary italic">Real-time property management overview</p>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="p-2 text-text-secondary hover:text-primary-blue-light transition-colors" title="Refresh Data">
                    <i class="fa-solid fa-rotate"></i>
                </button>
                <div class="h-8 w-[1px] bg-gray-light"></div>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary-black">Admin Panel</p>
                        <p class="text-[10px] text-success font-bold uppercase tracking-tighter">System Online</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-8 space-y-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg border border-border-color shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-text-secondary uppercase">Properties</p>
                            <h3 class="text-2xl font-black text-primary-black mt-1">12</h3>
                        </div>
                        <div class="p-2 bg-primary-blue-light/10 text-primary-blue-light rounded">
                            <i class="fa-solid fa-city"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg border border-border-color shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-text-secondary uppercase">Total Units</p>
                            <h3 class="text-2xl font-black text-primary-black mt-1">148</h3>
                        </div>
                        <div class="p-2 bg-primary-blue-dark/10 text-primary-blue-dark rounded">
                            <i class="fa-solid fa-door-open"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg border border-border-color shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-text-secondary uppercase">Active Tenants</p>
                            <h3 class="text-2xl font-black text-primary-black mt-1">132</h3>
                        </div>
                        <div class="p-2 bg-success/10 text-success rounded">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg border border-border-color shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-text-secondary uppercase">Monthly Revenue</p>
                            <h3 class="text-2xl font-black text-primary-black mt-1">$42,500</h3>
                        </div>
                        <div class="p-2 bg-primary-blue-light text-white rounded shadow-md">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg border border-border-color shadow-sm">
                    <h4 class="text-sm font-bold text-primary-blue-dark uppercase mb-6">Occupancy Rate</h4>
                    <div class="h-48 flex items-center justify-center bg-gray-lighter/30 border border-dashed border-gray-light rounded relative overflow-hidden">
                        <div class="text-center z-10">
                            <p class="text-4xl font-black text-primary-blue-light">89%</p>
                            <p class="text-xs text-text-secondary uppercase font-bold tracking-widest mt-1">Units Occupied</p>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-1/2 bg-primary-blue-light/5"></div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg border border-border-color shadow-sm">
                    <h4 class="text-sm font-bold text-primary-blue-dark uppercase mb-6">Revenue Growth</h4>
                    <div class="h-48 flex items-end gap-2 px-4 bg-gray-lighter/30 border border-dashed border-gray-light rounded">
                        <div class="flex-1 bg-primary-blue-dark/20 h-2/3 rounded-t"></div>
                        <div class="flex-1 bg-primary-blue-dark/40 h-3/4 rounded-t"></div>
                        <div class="flex-1 bg-primary-blue-dark/60 h-1/2 rounded-t"></div>
                        <div class="flex-1 bg-primary-blue-light h-5/6 rounded-t shadow-lg"></div>
                        <div class="flex-1 bg-primary-blue-dark/30 h-2/3 rounded-t"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 bg-white rounded-lg border border-border-color shadow-sm overflow-hidden">
                    <div class="p-4 border-b border-border-color flex justify-between items-center bg-white">
                        <h4 class="font-bold text-sm text-primary-black">Recent Payments</h4>
                        <button class="text-xs font-bold text-primary-blue-light hover:underline">Export CSV</button>
                    </div>
                    <table class="w-full text-left text-xs">
                        <thead class="bg-gray-lighter/50 text-text-secondary uppercase">
                            <tr>
                                <th class="px-6 py-4 font-bold">Tenant</th>
                                <th class="px-6 py-4 font-bold">Unit</th>
                                <th class="px-6 py-4 font-bold">Amount</th>
                                <th class="px-6 py-4 font-bold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border-color">
                            <tr>
                                <td class="px-6 py-4 font-bold">Chan Samnang</td>
                                <td class="px-6 py-4 text-text-secondary">Unit 402</td>
                                <td class="px-6 py-4 font-bold text-primary-blue-dark">$1,200.00</td>
                                <td class="px-6 py-4"><span class="text-success font-black text-[10px] uppercase italic">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-bold">Sok Mensa</td>
                                <td class="px-6 py-4 text-text-secondary">Unit 105</td>
                                <td class="px-6 py-4 font-bold text-primary-blue-dark">$850.00</td>
                                <td class="px-6 py-4"><span class="text-warning font-black text-[10px] uppercase italic">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="bg-error/5 rounded-lg border border-error/20 p-6 shadow-sm">
                    <div class="flex items-center gap-2 text-error mb-4">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <h4 class="font-black text-sm uppercase">Expiring Leases</h4>
                    </div>
                    <div class="space-y-4">
                        <div class="p-3 bg-white rounded border border-error/10 flex justify-between items-center">
                            <div>
                                <p class="text-xs font-bold text-primary-black">Unit 302 - B. Lee</p>
                                <p class="text-[10px] text-error font-bold">Ends in 5 days</p>
                            </div>
                            <button class="text-[10px] bg-error text-white px-2 py-1 rounded font-bold">Renew</button>
                        </div>
                        <div class="p-3 bg-white rounded border border-error/10 flex justify-between items-center">
                            <div>
                                <p class="text-xs font-bold text-primary-black">Unit 501 - K. Vann</p>
                                <p class="text-[10px] text-error font-bold">Ends in 12 days</p>
                            </div>
                            <button class="text-[10px] bg-error text-white px-2 py-1 rounded font-bold">Renew</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pb-8">
                
                <div class="bg-white rounded-lg border border-border-color shadow-sm">
                    <div class="p-4 border-b border-border-color">
                        <h4 class="font-bold text-sm text-primary-black uppercase tracking-tight">System-wide Maintenance</h4>
                    </div>
                    <div class="p-4 space-y-4">
                        <div class="flex items-center gap-4 p-3 bg-gray-lighter/30 rounded">
                            <div class="w-8 h-8 bg-warning text-white rounded-full flex items-center justify-center text-xs">
                                <i class="fa-solid fa-wrench"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-bold text-primary-black">Leaking Kitchen Sink</p>
                                <p class="text-[10px] text-text-secondary">Requested by Samnang (Unit 402)</p>
                            </div>
                            <span class="text-[10px] font-black text-warning italic uppercase">Pending</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-border-color shadow-sm">
                    <div class="p-4 border-b border-border-color">
                        <h4 class="font-bold text-sm text-primary-black uppercase tracking-tight">Recent Activities</h4>
                    </div>
                    <div class="p-4 space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 mt-1 rounded-full bg-primary-blue-light"></div>
                            <div>
                                <p class="text-xs text-primary-black leading-none">New tenant added to <span class="font-bold">Unit 204</span></p>
                                <p class="text-[10px] text-text-secondary mt-1">2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 mt-1 rounded-full bg-success"></div>
                            <div>
                                <p class="text-xs text-primary-black leading-none">Payment of <span class="font-bold">$1,200</span> received</p>
                                <p class="text-[10px] text-text-secondary mt-1">5 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>