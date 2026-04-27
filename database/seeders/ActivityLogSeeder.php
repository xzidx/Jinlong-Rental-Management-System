<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActivityLog;
use App\Models\User;

class ActivityLogSeeder extends Seeder
{
    public function run(): void
    {
        // Get users
        $admin = User::where('email', 'admin@jinlong.com')->first();
        $manager = User::where('email', 'manager@jinlong.com')->first();
        
        // Clear existing logs first
        ActivityLog::truncate();
        
        // Create sample logs
        $logs = [
            [
                'user_id' => $admin->id ?? 1,
                'action' => 'LOGIN',
                'table_name' => 'users',
                'record_id' => $admin->id ?? 1,
                'ip_address' => '192.168.1.1',
                'created_at' => now()->subHours(1),
            ],
            [
                'user_id' => $admin->id ?? 1,
                'action' => 'CREATE',
                'table_name' => 'properties',
                'record_id' => 1,
                'new_values' => json_encode(['name' => 'Sky Tower']),
                'ip_address' => '192.168.1.1',
                'created_at' => now()->subHours(2),
            ],
            [
                'user_id' => $manager->id ?? 2,
                'action' => 'UPDATE',
                'table_name' => 'tenants',
                'record_id' => 1,
                'old_values' => json_encode(['phone' => 'old']),
                'new_values' => json_encode(['phone' => 'new']),
                'ip_address' => '192.168.1.2',
                'created_at' => now()->subHours(3),
            ],
            [
                'user_id' => $admin->id ?? 1,
                'action' => 'DELETE',
                'table_name' => 'maintenance_requests',
                'record_id' => 1,
                'old_values' => json_encode(['title' => 'Old request']),
                'ip_address' => '192.168.1.1',
                'created_at' => now()->subDays(1),
            ],
        ];

        foreach ($logs as $log) {
            ActivityLog::create($log);
        }

        $this->command->info('✅ Activity logs seeded!');
        $this->command->info('Total logs: ' . ActivityLog::count());
    }
}
