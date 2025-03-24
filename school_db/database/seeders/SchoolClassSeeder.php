<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class BodieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = fopen("./seeder_txt/school_classes.txt", "r") or die("Unable to open file!");
        foreach ($items as $line) {
            $schoolclass = new SchoolClass();
            $item = explode($line, ';');
	        $schoolclass->name = $item[0];
            $schoolclass->school_year = $item[1];
            $schoolclass->save();
        }
    }
}