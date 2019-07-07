<?php

namespace App\Repositories;

use App\Project;
use App\Sprint;

class ProjectRepository  {
  
    protected $project;

    public function __construct(Project $project, Sprint $sprint) {
      $this->project = $project;
      $this->sprint = $sprint;
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

      
    public function getAvaliableProjects() {
      $sprints = $this->sprint->all();
      $projects = $this->project->all();
      $arrayProject = array();
      foreach ($projects as $key => $project) {
        $counter = $this->sprint->where('status', '3')->where('project_id', $project['id'])->get();
        $count = count($sprints) - 1;
        if($count !== count($counter)) {
          array_push($arrayProject, $this->project->where('id', $project['id'])->first());
        }
      }
      return $arrayProject;
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