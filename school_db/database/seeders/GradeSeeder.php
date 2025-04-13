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
        for ($i = 0; $i < 100; $i++) {
            $student = new Student();
            for ($j = 0; $j < 10; $j++) {
                $grade = new Grade();
                $grade->student_id = $student[$j]->id;
                $grade->grade = rand(1, 5);
                $grade->subject_id = rand(0, 26);
                $grade->save();
            }
        }
    }
}
