<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class testInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //ciudades

        $ciudades = ['Calabozo', 'San Juan de los Morros', 'Valle de la Pascua', 'Zaraza'];

        for ($i=0; $i < 4 ; $i++) { 
            DB::table('ciudades')->insert([
                'ciudad'    => $ciudades[$i],
            ]);
        };

        //centros

        $centros = ['Unerg Calabozo, Sector Merecurito', 'Unerg La Pascua, Calle El Paraiso, Centro', 'Unerg Zaraza, Sector La Pollosa', 'Ing. Sistemas, El Castrero, San Juan', 'Cs. Económicas, El Castrero, San Juan'];

        $ciudades = [1, 3, 4, 2, 2];

        for ($i=0; $i < 5; $i++) { 

            DB::table('centros')->insert([
                'centro'    => $centros[$i],
                'ciudad_id' => $ciudades[$i],
            ]);
        };
    }
}
