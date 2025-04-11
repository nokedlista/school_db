<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = fopen("./seeder_txt/students.txt", "r") or die("Unable to open file!");
        $classIDs = DB::table('school_classes')->pluck('id');
        $count = 0;
        while(!feof($items)) 
        {
            $lines = fgets($items);
            $line = explode($line, ';');
            $student = new Student();
            $student->name = $line[0];
            $student->class_id= $classIDs[$count];
            $student->gender = $line[1];
            $count++;
        }
    }
}