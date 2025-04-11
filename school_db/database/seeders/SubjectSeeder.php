<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = fopen("./seeder_txt/subjects.txt", "r") or die("Unable to open file!");
        while(!feof($items)) 
        {
            $line = fgets($items);
            $subject = new Subject();
	        $subject->name = $line;
            $subject->save();
        }
    }
}