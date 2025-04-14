<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;


class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = $this->getPath() . "database\Text\school_classes.txt";
        $items = fopen($path, 'r') or die('Unable to open file!');
        while (!feof($items)) {
            $schoolclass = new SchoolClass();
            $line = fgets($items);
            $item = explode(';', $line);
            $schoolclass->name = $item[0];
            $schoolclass->school_year = $item[1];
            $schoolclass->save();
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
