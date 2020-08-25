<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_admin')->insert([
            'name' => 'superadmin',
            'password' => bcrypt('superadmin'),
            'role' => 'superadmin',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
