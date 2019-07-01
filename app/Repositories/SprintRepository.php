<?php

namespace App\Repositories;

use App\Sprint;

class SprintRepository  {
  
    protected $sprint;

    public function __construct(Sprint $sprint) {
      $this->sprint = $sprint;
    }

    public function find($id) {
      return $this->sprint->find($id);
    }

    public function create($attributes) {
      return $this->sprint->create($attributes);
    }

    public function update($id, array $attributes) {
      return $this->sprint->find($id)->update($attributes);
    }
  
    public function all() {
      return $this->sprint->with(['project'])->get();
    }

    public function delete($id) {
     return $this->sprint->find($id)->delete();
    }

    public function checkSprint($name)
    {
      $sprint = $this->sprint->where('name', $name)->first();
      if ($sprint) {
        return true;
      }
      return false; 
    }
}