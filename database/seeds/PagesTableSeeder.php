<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'url' => 'index',
                'name' => 'Главная',
                'created_at' => '2020-09-03 21:02:25',
                'updated_at' => '2020-09-03 21:02:25',
            ),
            1 => 
            array (
                'id' => 2,
                'url' => 'services',
                'name' => 'Услуги',
                'created_at' => '2020-09-07 10:57:28',
                'updated_at' => '2020-09-07 10:57:28',
            ),
        ));
        
        
    }
}