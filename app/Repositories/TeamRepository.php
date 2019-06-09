<?php

namespace App\Repositories;

use App\Team;
use App\TeamUser;

class TeamRepository  {
  
    protected $team;
    protected $teamUser;

    public function __construct(Team $team, TeamUser $teamUser) {
      $this->team = $team;
      $this->teamUser = $teamUser;
    }

    public function find($id) {
      return $this->team->find($id);
    }

    public function create($attributes) {
      return $this->team->create($attributes);
    }

    public function createUserTeam($attributes) {
      return $this->teamUser->create($attributes);
    }

    public function update($id, array $attributes) {
      return $this->team->find($id)->update($attributes);
    }
  
    public function all() {
      $teams = $this->team->all();
      foreach ($teams as $key => $team) {
        $users = $this->teamUser::with(['user'])->where('team_id',$team['id'])->get();  
        if (count($users)>0) {
          $teams[$key]->users = $users;
        }
      }
      return $teams;
    }

    public function delete($id) {
     return $this->team->find($id)->delete();
    }

    public function checkTeam($name)
    {
      $team = $this->team->where('name', $name)->first();
      if ($team) {
        return true;
      }
      return false; 
    }
}