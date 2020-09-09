<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Услуги',
                'settings' => '{"auto": true, "mode": "horizontal", "pager": true, "pause": "5000", "speed": "1500", "controls": true, "touchEnabled": true, "oneToOneTouch": false, "adaptiveHeight": true, "preventDefaultSwipeX": false, "preventDefaultSwipeY": true}',
                'created_at' => '2020-09-07 10:59:21',
                'updated_at' => '2020-09-07 12:43:47',
            ),
        ));
        
        
    }
}