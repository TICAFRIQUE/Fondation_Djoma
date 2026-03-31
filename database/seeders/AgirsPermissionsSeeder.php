<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AgirsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'creer-agirs']);
        Permission::create(['name' => 'voir-agirs']);
        Permission::create(['name' => 'modifier-agirs']);
        Permission::create(['name' => 'supprimer-agirs']);
    }
}
