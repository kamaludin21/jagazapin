<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'position_id' => 1,
                'order' => 1,
                'name' => 'Akmal Abbas',
                'title_front' => NULL,
                'title_back' => 'SH, MH',
            ],
            [
                'position_id' => 2,
                'order' => 2,
                'name' => 'Hendrizal Husin',
                'title_front' => NULL,
                'title_back' => 'SH, MH',
            ],
            [
                'position_id' => 4,
                'order' => 3,
                'name' => 'Imran Yusuf',
                'title_front' => NULL,
                'title_back' => 'SH, MH',
            ],
            [
                'position_id' => 5,
                'order' => 4,
                'name' => 'Melinda',
                'title_front' => NULL,
                'title_back' => 'SH, MH',
            ],
            [
                'position_id' => 6,
                'order' => 5,
                'name' => 'Faisol',
                'title_front' => 'Kolonel Laut (KH)',
                'title_back' => 'SH',
            ],
            [
                'position_id' => 7,
                'order' => 6,
                'name' => 'Ayu Agung',
                'title_front' => NULL,
                'title_back' => 'SH, MH, MSi (Han)',
            ],
        ];
        foreach ($data as $item) :
            Staff::create(
                [
                    'user_id' => 1,
                    'position_id' => $item['position_id'],
                    'order' => $item['order'],
                    'name' => Str::headline(Str::lower($item['name'])),
                    'title_front' => $item['title_front'],
                    'title_back' => $item['title_back'],
                ],
            );
        endforeach;
    }
}
