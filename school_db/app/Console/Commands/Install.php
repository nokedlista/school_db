<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the migrations and seeders for the app';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $servername = "localhost";
        $name = "root";
        $password = "";

        $conn = mysqli_connect($servername, $name, $password);
        $sql = "SELECT SCHEMA_NAME
        FROM INFORMATION_SCHEMA.SCHEMATA
        WHERE SCHEMA_NAME = 'school_db';";
        if ($conn->query($sql)->num_rows > 0) {
            $this->info('Database already exists!');
            return;
        }
        $sql = "CREATE DATABASE IF NOT EXISTS school_db";
        if ($conn->query($sql) === TRUE) {
            $path = $this->laravel->databasePath() . DIRECTORY_SEPARATOR . 'seeders';
            $unordered_files = scandir($path, 1);
            $filecount = count($unordered_files) - 2;
            array_splice($unordered_files, $filecount, 2);
            $i = 5;
            foreach ($unordered_files as $temp) {
                $file = substr($temp, 0, strlen($temp) - 4);
                switch ($file) {
                    case "DatabaseSeeder":
                        $files[0] = $file;
                        break;
                    case "SubjectSeeder":
                        $files[1] = $file;
                        break;
                    case "SchoolClassSeeder":
                        $files[2] = $file;
                        break;
                    case "StudentSeeder":
                        $files[3] = $file;
                        break;
                    case "GradeSeeder":
                        $files[4] = $file;
                        break;
                    default:
                        $files[$i] = $file;
                        $i++;
                }
            }
            ksort($files);

            $totalSteps = count($files) + 2;
            $bar = $this->output->createProgressBar($totalSteps);
            $bar->start();
            $bar->advance();
            $this->line(" Database created!");

            Artisan::call('migrate');
            $bar->advance();
            $this->line(" Migration complete!");

            foreach ($files as $file) {
                Artisan::call('db:seed --class=' . $file);
                $bar->advance();
                $this->line(" {$file} complete!");
            }
            $bar->finish();
            $this->info(' Install complete!');

            mysqli_close($conn);
        }
    }
}
