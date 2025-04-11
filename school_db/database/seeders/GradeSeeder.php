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
        for ($i = 0; $i < 1000; $i++) {
            $grade = new Grade();
            $subject = new Subject();
	        // $grade->subject_id = $subject->
            $grade->student_id = $item[1];
            $grade->grade = $item[2];
            $grade->save();
        }
    }
}