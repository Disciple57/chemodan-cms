<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colors')->delete();
        
        \DB::table('colors')->insert(array (
            0 => 
            array (
                'id' => 1,
            'color' => 'rgb(217, 190, 149)',
                'num' => 6,
                'created_at' => '2020-09-03 18:31:56',
                'updated_at' => '2020-09-03 18:36:18',
            ),
            1 => 
            array (
                'id' => 2,
            'color' => 'rgb(186, 164, 108)',
                'num' => 7,
                'created_at' => '2020-09-03 18:32:14',
                'updated_at' => '2020-09-03 18:36:18',
            ),
            2 => 
            array (
                'id' => 3,
            'color' => 'rgb(33, 37, 41)',
                'num' => 2,
                'created_at' => '2020-09-03 18:32:35',
                'updated_at' => '2020-09-03 18:36:18',
            ),
            3 => 
            array (
                'id' => 4,
            'color' => 'rgb(45, 45, 45)',
                'num' => 3,
                'created_at' => '2020-09-03 18:32:52',
                'updated_at' => '2020-09-05 20:50:47',
            ),
            4 => 
            array (
                'id' => 5,
            'color' => 'rgb(255, 255, 255)',
                'num' => 4,
                'created_at' => '2020-09-03 18:33:13',
                'updated_at' => '2020-09-03 18:36:18',
            ),
            5 => 
            array (
                'id' => 6,
            'color' => 'rgba(255, 255, 255, 0.5)',
                'num' => 5,
                'created_at' => '2020-09-03 18:33:42',
                'updated_at' => '2020-09-03 18:36:18',
            ),
            6 => 
            array (
                'id' => 7,
            'color' => 'rgb(29, 31, 32)',
                'num' => 1,
                'created_at' => '2020-09-03 18:34:09',
                'updated_at' => '2020-09-03 18:36:18',
            ),
            7 => 
            array (
                'id' => 8,
            'color' => 'rgb(13, 14, 14)',
                'num' => 0,
                'created_at' => '2020-09-03 18:34:56',
                'updated_at' => '2020-09-03 18:36:18',
            ),
        ));
        
        
    }
}