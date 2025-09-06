<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
  public function run(): void {
    Role::firstOrCreate(['name' => 'admin']);
    Role::firstOrCreate(['name' => 'officer']);
    Role::firstOrCreate(['name' => 'applicant']);

    $admin = User::firstOrCreate(
      ['email' => 'admin@evisa.local'],
      [
        'name' => 'System Admin',
        'password' => Hash::make('ChangeMe!123')
      ]
    );
    $admin->assignRole('admin');
  }
}
