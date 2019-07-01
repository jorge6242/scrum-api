<?php

namespace App\Repositories;

use App\Backlog;
use App\Sprint;

class BacklogRepository  {
  
    protected $backlog;

    public function __construct(Backlog $backlog, Sprint $sprint) {
      $this->backlog = $backlog;
      $this->sprint = $sprint;
    }

    public function find($id) {
      return $this->backlog->find($id);
    }

    public function create($attributes) {
      return $this->backlog->create($attributes);
    }

    public function update($id, array $attributes) {
      return $this->backlog->find($id)->update($attributes);
    }
  
    public function all() {
      return $this->backlog->all();
    }

    public function getMainBacklog() {
      return  $backlog = $this->backlog->where('type',1)->get();
    }

    public function getBacklogsSprint($project) {
      $sprint = $this->sprint->where('project_id',$project)->where('status', 2)->first();
      $backlogs = $this->backlog->where('project_id',$project)->where('sprint_id',$sprint['id'])->where('type', 1)->get();
      foreach ($backlogs as $key => $backlog) {
        $tasks = $this->backlog->where('project_id',$project)->where('type',2)->where('assoc_backlog',$backlog['id'])->where('sprint_id',$sprint['id'])->get();
        if ($tasks) {
          $backlogs[$key]->tasks = $tasks;
        }
      }
      return $backlogs;
    }

    public function delete($id) {
     return $this->backlog->find($id)->delete();
    }

    public function checkBacklog($name)
    {
      $backlog = $this->backlog->where('name', $name)->first();
      if ($backlog) {
        return true;
      }
      return false; 
    }
}