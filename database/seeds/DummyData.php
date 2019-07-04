<?php

use Illuminate\Database\Seeder;


class DummyData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        
        $fruits= [
                    
            	    [1,'Mora', 'boysonberries'],
      			 	[2,'Frutilla','invierno'],
      				
        ];

  
        $fruits = array_map(function($fruits) use ($now) {
           return [
               'id' => $fruits[0],
               'specie' => $fruits[1],
               'variety' => $fruits[2],
               
               'updated_at' => $now,
               'created_at' => $now,
           ];
        }, $fruits);

        DB::table('fruits')->insert($fruits);
    }
    

}
