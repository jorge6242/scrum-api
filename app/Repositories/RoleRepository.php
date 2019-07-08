<?php

namespace App\Repositories;

use App\Role;

class RoleRepository  {
  
    protected $team;
    protected $teamUser;

    public function __construct(Role $role) {
      $this->role = $role;
    }

    public function find($id) {
      return $this->role->find($id);
    }

    public function create($attributes) {
      return $this->role->create($attributes);
    }

    public function createUserTeam($attributes) {
      return $this->role->create($attributes);
    }

    public function update($id, array $attributes) {
      return $this->role->find($id)->update($attributes);
    }
  
    public function all() {
      return $this->role->all();
    }

    public function delete($id) {
     return $this->role->find($id)->delete();
    }

    public function checkRole($name)
    {
      $role = $this->role->where('name', $name)->first();
      if ($role) {
        return true;
      }
      return false; 
    }
}