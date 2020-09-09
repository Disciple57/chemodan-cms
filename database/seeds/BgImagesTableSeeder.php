<?php

use Illuminate\Database\Seeder;

class BgImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bg_images')->delete();
        
        \DB::table('bg_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_image' => 7,
                'options' => '{"size": false, "unit": false, "repeat": false, "position_x": "center", "position_y": "center", "background_size": "cover"}',
                'num' => 1,
                'created_at' => '2020-09-03 21:01:31',
                'updated_at' => '2020-09-03 21:01:31',
            ),
            1 => 
            array (
                'id' => 2,
                'id_image' => 8,
                'options' => '{"size": false, "unit": false, "repeat": false, "position_x": "right", "position_y": "top", "background_size": "cover"}',
                'num' => 2,
                'created_at' => '2020-09-07 11:34:22',
                'updated_at' => '2020-09-07 11:54:19',
            ),
            2 => 
            array (
                'id' => 3,
                'id_image' => 9,
                'options' => '{"size": false, "unit": false, "repeat": false, "position_x": "center", "position_y": "center", "background_size": "cover"}',
                'num' => 3,
                'created_at' => '2020-09-07 11:56:35',
                'updated_at' => '2020-09-07 11:56:35',
            ),
            3 => 
            array (
                'id' => 4,
                'id_image' => 10,
                'options' => '{"size": false, "unit": false, "repeat": false, "position_x": "center", "position_y": "center", "background_size": "cover"}',
                'num' => 4,
                'created_at' => '2020-09-07 12:18:57',
                'updated_at' => '2020-09-07 12:18:57',
            ),
            4 => 
            array (
                'id' => 5,
                'id_image' => 11,
                'options' => '{"size": "400", "unit": "px", "repeat": false, "position_x": "right", "position_y": "center", "background_size": "external"}',
                'num' => 5,
                'created_at' => '2020-09-07 13:09:24',
                'updated_at' => '2020-09-07 13:10:37',
            ),
            5 => 
            array (
                'id' => 6,
                'id_image' => 12,
                'options' => '{"size": "400", "unit": "px", "repeat": false, "position_x": "left", "position_y": "center", "background_size": "external"}',
                'num' => 6,
                'created_at' => '2020-09-07 13:47:35',
                'updated_at' => '2020-09-07 13:47:35',
            ),
            6 => 
            array (
                'id' => 7,
                'id_image' => 13,
                'options' => '{"size": "400", "unit": "px", "repeat": false, "position_x": "right", "position_y": "center", "background_size": "external"}',
                'num' => 7,
                'created_at' => '2020-09-07 13:48:53',
                'updated_at' => '2020-09-07 13:48:53',
            ),
        ));
        
        
    }
}