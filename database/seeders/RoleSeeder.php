<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_desc' => 'User'
        ]);

        Role::create([
            'role_desc' => 'Admin'
        ]);
    }
}
