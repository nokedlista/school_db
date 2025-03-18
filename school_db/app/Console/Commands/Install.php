<?php

namespace App\Console\Commands;

use App\Models\User;
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
        if($conn->query($sql)->num_rows > 0)
        {
            $this->info('Database already exists!');
            return;
        }
        $sql = "CREATE DATABASE IF NOT EXISTS laravel_cars";
        if ($conn->query($sql) === TRUE)
        {
            $path = $this->laravel->databasePath().DIRECTORY_SEPARATOR.'seeders';
            $files = scandir($path, 1);
            $filecount = count($files)-2;
            array_splice($files, $filecount, 2);
            $bar = $this->output->createProgressBar($filecount+1);
            $this->info('Database created!');

            $bar->start();
            Artisan::call('migrate');
            $bar->advance();
            $this->info('Migration complete!');

            foreach ($files as $fill) 
            {
                $file = substr($fill, 0, strlen($fill)-4);
                Artisan::call('db:seed --class='.$file);

                $bar->advance();
                $this->info($file.' complete!');
            }
            $bar->finish();
            $this->info('Install complete!');

            mysqli_close($conn);
        } 
    }
}