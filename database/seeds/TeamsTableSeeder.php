<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [ 'name' => 'Product Owners', ],
            [ 'name' => 'Stackeholders', ],
            [ 'name' => 'Equipo 1', ],
        ];
        foreach ($teams as $team) {
            Team::create([
                'name' => $team['name'],
            ]);
        }
    }
}
