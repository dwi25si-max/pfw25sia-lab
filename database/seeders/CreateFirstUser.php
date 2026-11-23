<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'gatot@pcr.ac.id'],
            [
                'role' => 'admin',
                'name' => 'Admin',
                'password' => Hash::make('gatotkaca'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
