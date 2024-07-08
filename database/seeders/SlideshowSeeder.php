<?php

namespace Database\Seeders;

use App\Models\Slideshow;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SlideshowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title'         => 'Lorem ipsum dolor sit amet.',
                'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            ],
            [
                'title'         => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi, itaque.',
                'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto ut obcaecati praesentium incidunt, quibusdam vel.',
            ],
            [
                'title'         => 'Lorem ipsum dolor sit.',
                'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem omnis corrupti repellendus?',
            ],
            [
                'title'         => 'Lorem ipsum dolor sit amet consectetur.',
                'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, quae vel?',
            ],
            [
                'title'         => 'Lorem ipsum, dolor sit amet consectetur adipisicing.',
                'description'   => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit veritatis amet ducimus impedit excepturi!',
            ],
        ];
        foreach ($data as $item) :
            Slideshow::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                    'description' => Str::headline(Str::lower($item['description'])),
                ],
            );
        endforeach;
    }
}
