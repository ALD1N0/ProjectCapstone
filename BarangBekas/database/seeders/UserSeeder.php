<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User; // Perbaikan: gunakan model User, bukan auth

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Dina Rahmawati',
                'email' => 'dina@example.com',
                'username' => 'dina123',
                'alamat' => 'Jl. Merpati No.1',
                'telepon' => '081234567891',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Rizky Pratama',
                'email' => 'rizky@example.com',
                'username' => 'rizky_p',
                'alamat' => 'Jl. Kenari No.5',
                'telepon' => '082134567892',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Sari Utami',
                'email' => 'sari@example.com',
                'username' => 'sariutami',
                'alamat' => 'Jl. Anggrek No.10',
                'telepon' => '083134567893',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'fauzi@example.com',
                'username' => 'fauzi_ahmad',
                'alamat' => 'Jl. Melati No.2',
                'telepon' => '084134567894',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Lina Marlina',
                'email' => 'lina@example.com',
                'username' => 'linam',
                'alamat' => 'Jl. Mawar No.4',
                'telepon' => '085134567895',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'username' => 'budis',
                'alamat' => 'Jl. Cempaka No.7',
                'telepon' => '086134567896',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Putri Anjani',
                'email' => 'putri@example.com',
                'username' => 'putrianjani',
                'alamat' => 'Jl. Flamboyan No.3',
                'telepon' => '087134567897',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Agus Salim',
                'email' => 'agus@example.com',
                'username' => 'agussalim',
                'alamat' => 'Jl. Dahlia No.6',
                'telepon' => '088134567898',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Nina Suryani',
                'email' => 'nina@example.com',
                'username' => 'ninasurya',
                'alamat' => 'Jl. Sakura No.9',
                'telepon' => '089134567899',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Dani Setiawan',
                'email' => 'dani@example.com',
                'username' => 'danis',
                'alamat' => 'Jl. Teratai No.11',
                'telepon' => '081134567800',
                'foto' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
