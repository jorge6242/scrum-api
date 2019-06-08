<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService {

	public function __construct(UserRepository $user) {
		$this->user = $user ;
	}

	public function index() {
		return $this->user->all();
	}

	public function create($request) {
		return $this->user->create($request);
	}

	public function update($request, $id) {
      return $this->user->update($id, $request);
	}

	public function read($id) {
     return $this->user->find($id);
	}

	public function delete($id) {
      return $this->user->delete($id);
	}
}