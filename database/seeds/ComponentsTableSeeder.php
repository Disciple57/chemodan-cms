<?php

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('components')->delete();
        
        \DB::table('components')->insert(array (
            0 => 
            array (
                'id' => 1,
                'filename' => 'bxslider',
                'name' => 'bx-slider',
                'num' => 1,
                'html' => NULL,
                'css' => 1,
                'js' => 1,
                'created_at' => '2020-09-03 21:04:08',
                'updated_at' => '2020-09-03 21:04:08',
            ),
            1 => 
            array (
                'id' => 2,
                'filename' => 'topmenu',
                'name' => 'top-menu',
                'num' => 2,
                'html' => 1,
                'css' => 1,
                'js' => 1,
                'created_at' => '2020-09-03 21:05:59',
                'updated_at' => '2020-09-08 20:39:10',
            ),
            2 => 
            array (
                'id' => 3,
                'filename' => 'footer',
                'name' => 'footer',
                'num' => 3,
                'html' => 1,
                'css' => NULL,
                'js' => NULL,
                'created_at' => '2020-09-05 21:34:09',
                'updated_at' => '2020-09-05 23:00:13',
            ),
            3 => 
            array (
                'id' => 4,
                'filename' => 'anchor',
                'name' => 'Прокрутка до якоря',
                'num' => 4,
                'html' => NULL,
                'css' => NULL,
                'js' => 1,
                'created_at' => '2020-09-08 20:45:24',
                'updated_at' => '2020-09-08 20:50:14',
            ),
        ));
        
        
    }
}