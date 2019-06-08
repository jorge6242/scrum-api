<?php

namespace App\Repositories;

use App\Team;

class TeamRepository  {
  
    protected $post;

    public function __construct(Team $team) {
      $this->team = $team;
    }

    public function find($id) {
      return $this->team->find($id);
    }

    public function create($attributes) {
      return $this->team->create($attributes);
    }

    public function update($id, array $attributes) {
      return $this->team->find($id)->update($attributes);
    }
  
    public function all() {
      return $this->team->all();
    }

    public function delete($id) {
     return $this->team->find($id)->delete();
    }
}