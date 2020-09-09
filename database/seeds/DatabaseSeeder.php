<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(BgImagesTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(ComponentsTableSeeder::class);
        $this->call(FontsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(SeoTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
    }
}
