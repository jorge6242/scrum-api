<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Project test 1',
            'description' => 'Description test 1',
            'start_date' => '2019-06-05 04:49:59',
            'end_date' => '2019-06-05 04:49:59',
        ]);
    }
}