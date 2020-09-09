<?php

use Illuminate\Database\Seeder;

class FontsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fonts')->delete();
        
        \DB::table('fonts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'font-awesome-5-free-solid',
                'type' => 1,
                'num' => 1,
                'created_at' => '2020-09-03 18:03:53',
                'updated_at' => '2020-09-03 18:03:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'roboto-thin',
                'type' => 0,
                'num' => 2,
                'created_at' => '2020-09-03 18:04:58',
                'updated_at' => '2020-09-03 18:04:58',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roboto-light',
                'type' => 0,
                'num' => 3,
                'created_at' => '2020-09-03 18:05:26',
                'updated_at' => '2020-09-03 18:05:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'roboto-regular',
                'type' => 0,
                'num' => 4,
                'created_at' => '2020-09-03 18:06:01',
                'updated_at' => '2020-09-03 18:06:01',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'roboto-medium',
                'type' => 0,
                'num' => 5,
                'created_at' => '2020-09-03 18:06:38',
                'updated_at' => '2020-09-03 18:06:38',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'roboto-bold',
                'type' => 0,
                'num' => 6,
                'created_at' => '2020-09-03 18:07:28',
                'updated_at' => '2020-09-03 18:07:28',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'roboto-black',
                'type' => 0,
                'num' => 7,
                'created_at' => '2020-09-03 18:08:03',
                'updated_at' => '2020-09-03 18:08:03',
            ),
        ));
        
        
    }
}