<?php

namespace App\Repositories;

use App\Backlog;

class BacklogRepository  {
  
    protected $backlog;

    public function __construct(Backlog $backlog) {
      $this->backlog = $backlog;
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