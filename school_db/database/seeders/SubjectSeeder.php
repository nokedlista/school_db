<?php

namespace Database\Seeders;

use App\Models\Subject;
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
        $items = fopen("./seeder_txt/subjects.txt", "r") or die("Unable to open file!");
        foreach ($items as $item) {
            $subject = new Subject();
	        $subject->name = $item;
            $subject->save();
        }
    }
}