<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['title' => 'Html',],
            ['title' => 'Css',],
            ['title' => 'Bootstrap',],
            ['title' => 'Tailwind',],
            ['title' => 'Php',],
            ['title' => 'Javascript',],
            ['title' => 'Laravel',],
            ['title' => 'Livewire',],
            ['title' => 'Filament',],
        ];
        foreach ($datas as $data) :
            Tag::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($data['title']),
                    'title' => Str::headline(Str::lower($data['title'])),
                ],
            );
        endforeach;
    }
}
