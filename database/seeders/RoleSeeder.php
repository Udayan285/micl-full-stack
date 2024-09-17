<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * udayan285
     */
    public function run(): void
    {
        $roles = ['admin','moderator','user'];
            foreach ($roles as $role) {
                $newRole = new Role();
                $newRole->name = $role;
                $newRole->save();
        }
    }
}
