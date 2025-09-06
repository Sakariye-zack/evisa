<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 👉 Hubi in roles la abuuro haddii aysan jirin
        foreach (['admin', 'officer', 'applicant'] as $role) {
            Role::firstOrCreate(['name' => $role], ['guard_name' => 'web']);
        }

        // 👉 Abuur admin user haddii uusan jirin
        $user = User::firstOrCreate(
            ['email' => 'admin@evisa.local'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('ChangeMe!123'), // password default ah
            ]
        );

        // 👉 Siin role admin
        $user->syncRoles(['admin']); // hadii horey roles kale u haystay, waa la replace gareeyaa

        // 👉 Haddii aad u baahan tahay seeders kale
        $this->call([
            // AdminSeeder::class,
            // VisaTypeSeeder::class,
        ]);
    }
}