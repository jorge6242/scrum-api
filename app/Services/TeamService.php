<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;

class TeamService {

	public function __construct(TeamRepository $team, UserRepository $userRepository) {
		$this->team = $team;
		$this->userRepository = $userRepository;
	}

	public function index() {
		return $this->team->all();
	}

	public function create($request) {
		return $this->team->create($request);
	}

	public function createUserTeam($request) {
		list($team, $users) = [$request['team'], $request['users']];
		foreach ($users as $key => $user) {
				if(!$this->userRepository->checkUserTeam($team, $user['id'])){
					$attr = ['team_id' => $team, 'user_id' => $user['id']];
					$this->team->createUserTeam($attr);
				}
		}
		return true;
	}

	public function update($request, $id) {
      return $this->team->update($id, $request);
	}

	public function read($id) {
     return $this->team->find($id);
	}

	public function delete($id) {
      return $this->team->delete($id);
	}

	public function checkTeam($id) {
		return $this->team->checkTeam($id);
	}
}