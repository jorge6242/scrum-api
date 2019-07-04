<?php

namespace App\Services;

use App\Repositories\BacklogRepository;
use Illuminate\Http\Request;

class BacklogService {

	public function __construct(BacklogRepository $backlog) {
		$this->backlog = $backlog ;
	}

	public function index() {
		return $this->backlog->all();
	}

	public function getMainBacklog() {
		return $this->backlog->getMainBacklog();
	}

	public function getBacklogsSprint($project) {
		return $this->backlog->getBacklogsSprint($project);
	}

	public function getBacklogsFromSprint($sprint) {
		return $this->backlog->getBacklogsFromSprint($sprint);
	}


	public function create($request) {
		return $this->backlog->create($request);
	}

	public function update($request, $id) {
      return $this->backlog->update($id, $request);
	}

	public function read($id) {
     return $this->backlog->find($id);
	}

	public function delete($id) {
      return $this->backlog->delete($id);
	}

	public function checkTasksFromSprint($request) {
		return $this->backlog->checkTasksFromSprint($request);
}

	public function checkBacklog($name) {
		return $this->backlog->checkBacklog($name);
	}
}