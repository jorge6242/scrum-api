<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;

class RoleService {

	public function __construct(RoleRepository $role) {
		$this->role = $role;
	}

	public function index() {
		return $this->role->all();
	}

	public function create($request) {
		return $this->role->create($request);
	}

	public function update($request, $id) {
      return $this->role->update($id, $request);
	}

	public function read($id) {
     return $this->role->find($id);
	}

	public function delete($id) {
      return $this->role->delete($id);
	}

	public function checkRole($id) {
		return $this->role->checkRole($id);
	}
}