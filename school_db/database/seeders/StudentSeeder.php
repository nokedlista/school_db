<?php

namespace Database\Seeders;

use App\Models\Student;
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
        $items = fopen("./seeder_txt/students.txt", "r") or die("Unable to open file!");
        foreach ($items as $line) {
            $student = new Student();
            $item = explode($line, ';');
	        $student->name = $item[0];
            $class = 0;
            $count = 0
            $student->class_id = $class;
            $count++;
            if($count = 30)
            {
                $class++;
            }
            $student->gender = $item[1];
            $student->save();
        }
    }
}