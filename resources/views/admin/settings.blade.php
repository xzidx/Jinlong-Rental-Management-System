@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">System Settings</h2>
            <p class="text-gray-500 text-sm mt-1">Configure your system preferences</p>
        </div>
        <div class="flex gap-3">
            <button onclick="location.reload()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm">
                <i class="fa-solid fa-rotate-right mr-2"></i>Reset
            </button>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <!-- Left Column - Settings Forms -->
        <div class="col-span-2 space-y-6">
            <!-- General Settings -->
            <div class="bg-white rounded-xl shadow-sm border ">
                <div class="px-5 py-3 border-b border-gray-100">
                    <h3 class="font-medium text-gray-800">General Settings</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Basic company information</p>
                </div>
                <div class="p-5 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                        <input type="text" value="Jinlong Property Management" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company Email</label>
                            <input type="email" value="info@jinlong.com" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company Phone</label>
                            <input type="text" value="+86 123 456 7890" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <textarea rows="2" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm">123 Main Street, Guangzhou, China</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Company Logo</label>
                        <div class="border-2 border-dashed border-gray-200 rounded-lg p-4 text-center hover:border-blue-400 transition-colors cursor-pointer">
                            <i class="fa-solid fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                            <p class="text-xs text-gray-500">Click or drag to upload logo</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Settings -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-5 py-3 border-b border-gray-100">
                    <h3 class="font-medium text-gray-800">Payment Settings</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Configure rent payment rules</p>
                </div>
                <div class="p-5 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Late Fee ($)</label>
                            <input type="number" value="50" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Grace Period (days)</label>
                            <input type="number" value="5" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Due Day</label>
                        <select class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm bg-white">
                            <option>1st of month</option>
                            <option>5th of month</option>
                            <option selected>10th of month</option>
                            <option>15th of month</option>
                            <option>20th of month</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Notification Settings -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-5 py-3 border-b border-gray-100">
                    <h3 class="font-medium text-gray-800">Notifications</h3>
                </div>
                <div class="p-5 space-y-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Email Notifications</p>
                            <p class="text-xs text-gray-500">Receive email alerts</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-10 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                        </label>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Payment Alerts</p>
                            <p class="text-xs text-gray-500">When rent is due</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-10 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                        </label>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Maintenance Updates</p>
                            <p class="text-xs text-gray-500">When request is updated</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-10 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="bg-white rounded-xl shadow-sm border border-red-200">
                <div class="px-5 py-3 border-b border-red-100 bg-red-50">
                    <h3 class="font-medium text-red-600">Danger Zone</h3>
                </div>
                <div class="p-5 space-y-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Backup Database</p>
                            <p class="text-xs text-gray-500">Download database backup</p>
                        </div>
                        <button class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1.5 rounded-lg text-xs transition-colors">Download</button>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Clear Activity Logs</p>
                            <p class="text-xs text-gray-500">Remove old activity logs</p>
                        </div>
                        <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1.5 rounded-lg text-xs transition-colors">Clear</button>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                        <div>
                            <p class="text-sm font-medium text-red-600">Delete All Data</p>
                            <p class="text-xs text-gray-500">Permanent deletion</p>
                        </div>
                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-xs transition-colors">Delete</button>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg text-sm font-medium transition-colors">
                    <i class="fa-solid fa-save mr-2"></i>Save All Settings
                </button>
            </div>
        </div>
    </div>
</div>
@endsection