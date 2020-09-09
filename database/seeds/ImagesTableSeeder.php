<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('images')->delete();
        
        \DB::table('images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '5f510da912740',
                'mime' => 'svg',
                'size' => 8878,
                'info' => '0',
                'num' => 1,
                'created_at' => '2020-09-03 18:37:13',
                'updated_at' => '2020-09-07 10:43:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '5f510db290262',
                'mime' => 'svg',
                'size' => 2501,
                'info' => '0',
                'num' => 2,
                'created_at' => '2020-09-03 18:37:22',
                'updated_at' => '2020-09-03 18:37:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '5f510dc45547f',
                'mime' => 'png',
                'size' => 77086,
                'info' => '278x247',
                'num' => 3,
                'created_at' => '2020-09-03 18:37:40',
                'updated_at' => '2020-09-03 18:37:40',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '5f510dcc2998e',
                'mime' => 'png',
                'size' => 63068,
                'info' => '278x247',
                'num' => 4,
                'created_at' => '2020-09-03 18:37:48',
                'updated_at' => '2020-09-03 18:37:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '5f510dd66cf20',
                'mime' => 'png',
                'size' => 111282,
                'info' => '278x247',
                'num' => 5,
                'created_at' => '2020-09-03 18:37:58',
                'updated_at' => '2020-09-03 18:37:58',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '5f510ddd8acee',
                'mime' => 'png',
                'size' => 442491,
                'info' => '604x624',
                'num' => 6,
                'created_at' => '2020-09-03 18:38:05',
                'updated_at' => '2020-09-03 18:38:05',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '5f510e387f750',
                'mime' => 'jpg',
                'size' => 149059,
                'info' => '1920x1005',
                'num' => 7,
                'created_at' => '2020-09-03 18:39:36',
                'updated_at' => '2020-09-03 18:39:36',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '5f55f0721dcd7',
                'mime' => 'jpg',
                'size' => 207431,
                'info' => '2096x718',
                'num' => 8,
                'created_at' => '2020-09-07 11:33:54',
                'updated_at' => '2020-09-07 11:33:54',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '5f55f5a89b301',
                'mime' => 'jpg',
                'size' => 200903,
                'info' => '1920x450',
                'num' => 9,
                'created_at' => '2020-09-07 11:56:08',
                'updated_at' => '2020-09-07 11:56:08',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '5f55fae02d4f1',
                'mime' => 'jpg',
                'size' => 354026,
                'info' => '1921x778',
                'num' => 10,
                'created_at' => '2020-09-07 12:18:24',
                'updated_at' => '2020-09-07 12:27:43',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '5f5606a613070',
                'mime' => 'svg',
                'size' => 2094,
                'info' => '0',
                'num' => 11,
                'created_at' => '2020-09-07 13:08:38',
                'updated_at' => '2020-09-07 13:08:38',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '5f560faba7747',
                'mime' => 'svg',
                'size' => 2404,
                'info' => '0',
                'num' => 12,
                'created_at' => '2020-09-07 13:47:07',
                'updated_at' => '2020-09-07 13:47:07',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '5f5610019ab3b',
                'mime' => 'svg',
                'size' => 4359,
                'info' => '0',
                'num' => 13,
                'created_at' => '2020-09-07 13:48:33',
                'updated_at' => '2020-09-07 13:48:33',
            ),
        ));
        
        
    }
}