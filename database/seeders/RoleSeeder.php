<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name'          => 'super-admin',
                'guard_name'    => 'web',
            ],
            [
                'name'          => 'admin',
                'guard_name'    => 'web',
            ],
            [
                'name'          => 'user',
                'guard_name'    => 'web',
            ],
        ];
        foreach ($datas as $data) :
            DB::table('roles')->insert(
                [
                    'name'          => $data['name'],
                    'guard_name'    => $data['guard_name'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
            );
        endforeach;
    }
}
