<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 0;
        for ($i = 0; $i < 100; $i++) {
            $id++;
            for ($j = 0; $j < 10; $j++) {
                $grade = new Grade();
                $grade->student_id = $id;
                $grade->grade = rand(1, 5);
                $grade->subject_id = rand(1, 27);
                $grade->save();
            }
        }
    }
}
