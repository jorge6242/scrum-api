<?php

namespace App\Services;

use App\Repositories\SprintRepository;
use Illuminate\Http\Request;

class SprintService {

	public function __construct(SprintRepository $sprint) {
		$this->sprint = $sprint ;
	}

	public function index() {
		return $this->sprint->all();
	}

	public function getSprintsProject($project) {
		return $this->sprint->getSprintsProject($project);
	}

	public function create($request) {
		return $this->sprint->create($request);
	}

	public function update($request, $id) {
      return $this->sprint->update($id, $request);
	}

	public function read($id) {
     return $this->sprint->find($id);
	}

	public function delete($id) {
      return $this->sprint->delete($id);
	}

	public function checkSprint($name) {
		return $this->sprint->checkSprint($name);
	}
}