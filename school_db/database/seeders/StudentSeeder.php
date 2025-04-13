<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = fopen(getcwd(), 'r') or die('Unable to open file!');
        while (!feof($items)) {
            $line = fgets($items);
            $item = explode($line, ';');
            $student = new Student();
            $student->name = $item[0];
            $student->class_id = rand(0, 34);
            $student->gender = $item[1];
        }
    }
}
