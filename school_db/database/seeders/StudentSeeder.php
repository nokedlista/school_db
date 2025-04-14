<?php

namespace Database\Seeders;

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
        $path = $this->getPath() . "database\Text\students.txt";
        $items = fopen($path, 'r') or die('Unable to open file!');
        while (!feof($items)) {
            $line = fgets($items);
            $item = explode(';', $line);
            $student = new Student();
            $student->name = $line[0];
            $student->class_id = rand(0, 34);
            $student->gender = $item[1];
        }
    }

    function getPath()
    {
        $fullPath = getcwd();
        $arrayPath = explode($fullPath, '/');
        array_splice($arrayPath, count($arrayPath)-1, 1);
        return implode('/', $arrayPath);
    }
}
