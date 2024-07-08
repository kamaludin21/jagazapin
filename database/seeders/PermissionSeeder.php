<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'view_role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_article',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_file',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_image',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_information',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_link',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_nav::menu',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_page',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_slideshow',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view_any_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'restore_any_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'replicate_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reorder_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete_any_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_video',
                'guard_name' => 'web',
            ],
            [
                'name' => 'force_delete_any_video',
                'guard_name' => 'web',
            ],
        ];
        foreach ($datas as $data) :
            DB::table('permissions')->insert(
                [
                    'name' => $data['name'],
                    'guard_name' => $data['guard_name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            );
        endforeach;
    }
}
