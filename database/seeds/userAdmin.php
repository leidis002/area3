<?php

use Illuminate\Database\Seeder;

class userAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'		=> 'admin',
        	'password'	=> bcrypt('apunevota2016'),
        ]);
    }
}
