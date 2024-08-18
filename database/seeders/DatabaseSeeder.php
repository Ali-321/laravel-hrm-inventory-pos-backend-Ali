<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ali User',
            'email' => 'ali@fic20.com',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Udin User',
            'email' => 'Udin@fic20.com',
            'password' => Hash::make('12345678'),
        ]);


        //call CompanySeeder
        $this->call([
            CompanySeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PermissionRoleSeeder::class,
            DepartmentSeeder::class,
            DesignationSeeder::class,
            ShiftSeeder::class,
            BasicSalarySeeder::class,
            RoleUserSeeder::class,
            HolidaySeeder::class,
        ]);

    }
}
