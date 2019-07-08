<?php

namespace App\Repositories;

use App\User;
use App\TeamUser;

class UserRepository  {
  
    protected $user;
    protected $teamUser;

    public function __construct(User $user, TeamUser $teamUser) {
      $this->user = $user;
      $this->teamUser = $teamUser;
    }

    public function find($id) {
      return $this->user->find($id);
    }

    public function create($attributes) {
      return $this->user->create($attributes);
    }

    public function update($id, array $attributes) {
      return $this->user->find($id)->update($attributes);
    }

    public function all() {
      return $this->user->all();
    }

    public function getUserProfile() {
      return $this->user->where('id', auth()->user()->id)->with(['role'])->first();
    }
  
    public function availableToTeam() {
      $arrayUsers = array();
      $users = $this->user->all();
      foreach ($users as $key => $user) {
       $userTeam = $this->teamUser->where('user_id',$user['id'])->get();
        if (count($userTeam) === 0) {
          array_push($arrayUsers,$user);
        }
      }
      return $arrayUsers;
    }

    public function checkUserTeam($team,$user) {
      $userTeam = $this->teamUser->where('user_id',$user)->get();
      if(count($userTeam) > 0){
        return true;
      }
      return false;
    }

    public function delete($id) {
     return $this->user->find($id)->delete();
    }

    public function checkUser($email)
    {
      $user = $this->user->where('email', $email)->first();
      if ($user) {
        return true;
      }
      return false; 
    }
}