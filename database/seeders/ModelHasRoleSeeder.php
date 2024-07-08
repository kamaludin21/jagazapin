<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'role_id'       => '1',
                'model_type'    => 'App\Models\User',
                'model_id'      => '1',
            ],
            [
                'role_id'       => '2',
                'model_type'    => 'App\Models\User',
                'model_id'      => '2',
            ],
            [
                'role_id'       => '3',
                'model_type'    => 'App\Models\User',
                'model_id'      => '3',
            ],
            [
                'role_id'       => '1',
                'model_type'    => 'App\Models\User',
                'model_id'      => '4',
            ],
            [
                'role_id'       => '2',
                'model_type'    => 'App\Models\User',
                'model_id'      => '5',
            ],
            [
                'role_id'       => '3',
                'model_type'    => 'App\Models\User',
                'model_id'      => '6',
            ],
        ];
        foreach ($datas as $data) :
            DB::table('model_has_roles')->insert(
                [
                    'role_id'       => $data['role_id'],
                    'model_type'    => $data['model_type'],
                    'model_id'      => $data['model_id'],
                ],
            );
        endforeach;
    }
}
