<?php

namespace App\Repositories;

use App\Project;

class ProjectRepository  {
  
    protected $project;

    public function __construct(Project $project) {
      $this->project = $project;
    }

    public function find($id) {
      return $this->project->find($id);
    }

    public function create($attributes) {
      return $this->project->create($attributes);
    }

    public function update($id, array $attributes) {
      return $this->project->find($id)->update($attributes);
    }
  
    public function all() {
      return $this->project->all();
    }

    public function delete($id) {
     return $this->project->find($id)->delete();
    }

    public function checkProject($name)
    {
      $project = $this->project->where('name', $name)->first();
      if ($project) {
        return true;
      }
      return false; 
    }
}