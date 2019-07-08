<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [ 'name' => 'Proyecto', ],
            [ 'name' => 'Desarrollo', ],
            [ 'name' => 'QA', ],
        ];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role['name'],
            ]);
        }
    }
}
