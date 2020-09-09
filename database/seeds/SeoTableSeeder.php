<?php

use Illuminate\Database\Seeder;

class SeoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seo')->delete();
        
        \DB::table('seo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'resource' => 'Pages',
                'id_resource' => 1,
            'meta' => '{"extra": "<meta name=\\"author\\" content=\\"Иванов Иван Иванович\\" />", "title": "Главная страница (demo)", "description": "Демонстрационная страница. Краткое содержание (description)"}',
                'created_at' => '2020-09-03 21:02:25',
                'updated_at' => '2020-09-08 18:17:36',
            ),
            1 => 
            array (
                'id' => 2,
                'resource' => 'Pages',
                'id_resource' => 2,
            'meta' => '{"extra": "<meta name=\\"author\\" content=\\"Иванов Иван Иванович\\" />", "title": "Наши услуги (demo)", "description": "Демонстрационная страница. Краткое содержание (description)"}',
                'created_at' => '2020-09-07 10:57:28',
                'updated_at' => '2020-09-08 18:17:43',
            ),
        ));
        
        
    }
}