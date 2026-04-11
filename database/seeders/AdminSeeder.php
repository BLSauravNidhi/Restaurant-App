<?php

namespace Database\Seeders;

use App\Models\RestaurentAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exampleAdmins = collect([
            [
                'admin_name' => 'admin',
                'email' => 'admin@123' ,
                'password' => 'admin@123',
                'role' => 'administrator',
            ],
            [
                'admin_name' => 'waiter',
                'email' => 'waiter@123' ,
                'password' => 'waiter@123',
                'role' => 'waiter',
            ],
            [
                'admin_name' => 'kitchen',
                'email' => 'kitchen@123' ,
                'password' => 'kitchen@123',
                'role' => 'kitchen',
            ],
        ]);

        $exampleAdmins->each(function($user){
            RestaurentAdmin::create($user);
        });

        // RestaurentAdmin::create([
        //     'admin_name' => 'admin',
        //     'email' => 'admin@123' ,
        //     'password' => 'admin@123',
        //     'role' => 'administrator',
        // ]);
    }
}
