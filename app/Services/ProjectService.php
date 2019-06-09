<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectService {

	public function __construct(ProjectRepository $project) {
		$this->project = $project ;
	}

	public function index() {
		return $this->project->all();
	}

	public function create($request) {
		return $this->project->create($request);
	}

	public function update($request, $id) {
      return $this->project->update($id, $request);
	}

	public function read($id) {
     return $this->project->find($id);
	}

	public function delete($id) {
      return $this->project->delete($id);
	}

	public function checkProject($name) {
		return $this->project->checkProject($name);
	}
}