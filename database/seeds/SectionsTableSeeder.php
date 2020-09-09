<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'resource' => 'Pages',
                'id_resource' => 1,
                'num' => 1,
                'status' => 'published',
                'extra_resource' => 'Components',
                'id_extra_resource' => 2,
                'created_at' => '2020-09-03 21:06:53',
                'updated_at' => '2020-09-03 21:06:53',
            ),
            1 => 
            array (
                'id' => 2,
                'resource' => 'Pages',
                'id_resource' => 1,
                'num' => 2,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-03 21:07:00',
                'updated_at' => '2020-09-03 21:08:21',
            ),
            2 => 
            array (
                'id' => 3,
                'resource' => 'Pages',
                'id_resource' => 1,
                'num' => 3,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-03 21:08:31',
                'updated_at' => '2020-09-03 21:09:10',
            ),
            3 => 
            array (
                'id' => 4,
                'resource' => 'Pages',
                'id_resource' => 1,
                'num' => 4,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-03 21:09:30',
                'updated_at' => '2020-09-03 21:10:07',
            ),
            4 => 
            array (
                'id' => 5,
                'resource' => 'Pages',
                'id_resource' => 1,
                'num' => 5,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-03 21:10:51',
                'updated_at' => '2020-09-03 21:11:11',
            ),
            5 => 
            array (
                'id' => 6,
                'resource' => 'Pages',
                'id_resource' => 1,
                'num' => 6,
                'status' => 'published',
                'extra_resource' => 'Components',
                'id_extra_resource' => 3,
                'created_at' => '2020-09-05 21:59:22',
                'updated_at' => '2020-09-05 21:59:22',
            ),
            6 => 
            array (
                'id' => 7,
                'resource' => 'Pages',
                'id_resource' => 2,
                'num' => 0,
                'status' => 'published',
                'extra_resource' => 'Components',
                'id_extra_resource' => 2,
                'created_at' => '2020-09-07 10:57:40',
                'updated_at' => '2020-09-08 13:19:46',
            ),
            7 => 
            array (
                'id' => 8,
                'resource' => 'Sliders',
                'id_resource' => 1,
                'num' => 8,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-07 10:59:34',
                'updated_at' => '2020-09-07 11:36:28',
            ),
            8 => 
            array (
                'id' => 9,
                'resource' => 'Pages',
                'id_resource' => 2,
                'num' => 1,
                'status' => 'published',
                'extra_resource' => 'Sliders',
                'id_extra_resource' => 1,
                'created_at' => '2020-09-07 11:51:18',
                'updated_at' => '2020-09-08 13:19:46',
            ),
            9 => 
            array (
                'id' => 10,
                'resource' => 'Sliders',
                'id_resource' => 1,
                'num' => 10,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-07 11:57:11',
                'updated_at' => '2020-09-07 12:08:46',
            ),
            10 => 
            array (
                'id' => 11,
                'resource' => 'Sliders',
                'id_resource' => 1,
                'num' => 11,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-07 12:17:53',
                'updated_at' => '2020-09-07 12:24:17',
            ),
            11 => 
            array (
                'id' => 12,
                'resource' => 'Pages',
                'id_resource' => 2,
                'num' => 2,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-07 12:53:46',
                'updated_at' => '2020-09-08 13:19:46',
            ),
            12 => 
            array (
                'id' => 13,
                'resource' => 'Pages',
                'id_resource' => 2,
                'num' => 5,
                'status' => 'published',
                'extra_resource' => 'Components',
                'id_extra_resource' => 3,
                'created_at' => '2020-09-07 13:58:41',
                'updated_at' => '2020-09-08 13:22:06',
            ),
            13 => 
            array (
                'id' => 14,
                'resource' => 'Pages',
                'id_resource' => 2,
                'num' => 3,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-08 13:17:50',
                'updated_at' => '2020-09-08 13:22:06',
            ),
            14 => 
            array (
                'id' => 15,
                'resource' => 'Pages',
                'id_resource' => 2,
                'num' => 4,
                'status' => 'published',
                'extra_resource' => 'Builder',
                'id_extra_resource' => NULL,
                'created_at' => '2020-09-08 13:18:52',
                'updated_at' => '2020-09-08 13:22:06',
            ),
        ));
        
        
    }
}