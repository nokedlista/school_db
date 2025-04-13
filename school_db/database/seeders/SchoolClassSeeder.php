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
        echo "current user: " . get_current_user();
        $items = fopen(getcwd(), 'r') or die('Unable to open file!');
        while (!feof($items)) {
            $schoolclass = new SchoolClass();
            $line = fgets($items);
            $item = explode($line, ';');
            $schoolclass->name = $item[0];
            $schoolclass->school_year = $item[1];
            $schoolclass->save();
        }
    }
}
