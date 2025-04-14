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
        $path = $this->getPath() . "database\Text\subjects.txt";
        $items = fopen($path, 'r') or die('Unable to open file!');
        while (!feof($items)) {
            $line = fgets($items);
            $subject = new Subject();
            $subject->name = $line;
            $subject->save();
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
