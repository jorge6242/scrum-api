<?php

namespace App\Services;

use App\Repositories\TeamRepository;
use Illuminate\Http\Request;

class TeamService {

	public function __construct(TeamRepository $team) {
		$this->team = $team ;
	}

	public function index() {
		return $this->team->all();
	}

	public function create($request) {
		return $this->team->create($request);
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
}