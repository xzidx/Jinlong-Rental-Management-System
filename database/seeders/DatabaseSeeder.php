<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Lease;
use App\Models\Payment;
use App\Models\MaintenanceRequest;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Users
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@jinlong.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Manager User',
            'email' => 'manager@jinlong.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'is_active' => true,
        ]);

        // Create Tenants
        $tenant1 = Tenant::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '0123456789',
            'id_card_number' => 'ID001',
            'emergency_contact_name' => 'Jane Doe',
            'emergency_contact_phone' => '0987654321',
            'address' => '123 Main St, Guangzhou',
            'is_active' => true,
        ]);

        $tenant2 = Tenant::create([
            'first_name' => 'Mary',
            'last_name' => 'Jane',
            'email' => 'mary.jane@example.com',
            'phone' => '0123456790',
            'id_card_number' => 'ID002',
            'emergency_contact_name' => 'Mike Jane',
            'emergency_contact_phone' => '0987654322',
            'address' => '456 Oak St, Guangzhou',
            'is_active' => true,
        ]);

        $tenant3 = Tenant::create([
            'first_name' => 'Peter',
            'last_name' => 'Lee',
            'email' => 'peter.lee@example.com',
            'phone' => '0123456791',
            'id_card_number' => 'ID003',
            'emergency_contact_name' => 'Susan Lee',
            'emergency_contact_phone' => '0987654323',
            'address' => '789 Pine St, Guangzhou',
            'is_active' => true,
        ]);

        // Create Tenant Users
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password'),
            'role' => 'tenant',
            'tenant_id' => $tenant1->id,
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Mary Jane',
            'email' => 'mary.jane@example.com',
            'password' => Hash::make('password'),
            'role' => 'tenant',
            'tenant_id' => $tenant2->id,
            'is_active' => true,
        ]);

        // Create Properties
        $property1 = Property::create([
            'name' => 'Sky Tower',
            'address' => '123 Main Street',
            'city' => 'Guangzhou',
            'district' => 'Tianhe',
            'type' => 'residential',
            'total_units' => 50,
            'construction_year' => 2020,
            'description' => 'Luxury apartment building with swimming pool and gym.',
            'is_active' => true,
        ]);

        $property2 = Property::create([
            'name' => 'River View',
            'address' => '456 River Road',
            'city' => 'Guangzhou',
            'district' => 'Haizhu',
            'type' => 'residential',
            'total_units' => 30,
            'construction_year' => 2022,
            'description' => 'Beautiful river view apartments.',
            'is_active' => true,
        ]);

        // Create Units
        $unit1 = Unit::create([
            'property_id' => $property1->id,
            'unit_number' => '101',
            'floor_number' => 1,
            'bedrooms' => 2,
            'bathrooms' => 2,
            'area_sqft' => 850,
            'monthly_rent' => 1200,
            'security_deposit' => 1200,
            'status' => 'occupied',
            'description' => 'Corner unit with city view',
        ]);

        $unit2 = Unit::create([
            'property_id' => $property1->id,
            'unit_number' => '102',
            'floor_number' => 1,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'area_sqft' => 550,
            'monthly_rent' => 800,
            'security_deposit' => 800,
            'status' => 'available',
            'description' => 'Cozy studio apartment',
        ]);

        $unit3 = Unit::create([
            'property_id' => $property2->id,
            'unit_number' => '201',
            'floor_number' => 2,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area_sqft' => 1200,
            'monthly_rent' => 1500,
            'security_deposit' => 1500,
            'status' => 'occupied',
            'description' => 'Spacious family unit',
        ]);

        // Create Leases
        $lease1 = Lease::create([
            'unit_id' => $unit1->id,
            'tenant_id' => $tenant1->id,
            'start_date' => '2026-01-01',
            'end_date' => '2026-12-31',
            'monthly_rent' => 1200,
            'security_deposit' => 1200,
            'status' => 'active',
            'renewal_count' => 0,
            'terms_conditions' => 'Standard lease agreement',
        ]);

        $lease2 = Lease::create([
            'unit_id' => $unit3->id,
            'tenant_id' => $tenant2->id,
            'start_date' => '2026-02-01',
            'end_date' => '2026-01-31',
            'monthly_rent' => 1500,
            'security_deposit' => 1500,
            'status' => 'active',
            'renewal_count' => 0,
            'terms_conditions' => 'Standard lease agreement',
        ]);

        // Create Payments
        Payment::create([
            'lease_id' => $lease1->id,
            'payment_method' => 'bank_transfer',
            'amount' => 1200,
            'payment_date' => '2026-04-01',
            'due_date' => '2026-04-30',
            'status' => 'paid',
            'transaction_reference' => 'TXN001',
            'notes' => 'April rent',
        ]);

        Payment::create([
            'lease_id' => $lease1->id,
            'payment_method' => 'bank_transfer',
            'amount' => 1200,
            'payment_date' => '2026-03-01',
            'due_date' => '2026-03-31',
            'status' => 'paid',
            'transaction_reference' => 'TXN002',
            'notes' => 'March rent',
        ]);

        Payment::create([
            'lease_id' => $lease2->id,
            'payment_method' => 'cash',
            'amount' => 1500,
            'payment_date' => '2026-04-05',
            'due_date' => '2026-04-30',
            'status' => 'pending',
            'transaction_reference' => 'TXN003',
            'notes' => 'April rent',
        ]);

        // Create Maintenance Requests
        MaintenanceRequest::create([
            'lease_id' => $lease1->id,
            'unit_id' => $unit1->id,
            'title' => 'Air Conditioner Not Working',
            'description' => 'The AC is blowing hot air. It is very hot in the apartment.',
            'priority' => 'high',
            'status' => 'in_progress',
            'requested_date' => '2026-04-20',
            'scheduled_date' => '2026-04-22',
            'resolution_notes' => 'Technician scheduled',
            'cost' => 0,
        ]);

        MaintenanceRequest::create([
            'lease_id' => $lease2->id,
            'unit_id' => $unit3->id,
            'title' => 'Leaking Kitchen Sink',
            'description' => 'Water is leaking from under the sink.',
            'priority' => 'medium',
            'status' => 'pending',
            'requested_date' => '2026-04-25',
            'scheduled_date' => null,
            'resolution_notes' => null,
            'cost' => 0,
        ]);

        // ========== ADD THIS LINE ==========
        $this->call(ActivityLogSeeder::class);
        // ===================================

        $this->command->info('✅ Sample data created successfully!');
        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->info('Admin:    admin@jinlong.com / password');
        $this->command->info('Manager:  manager@jinlong.com / password');
        $this->command->info('Tenant:   john.doe@example.com / password');
    }
}