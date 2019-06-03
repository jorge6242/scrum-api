<?php

namespace App\Services;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductService {

	public function __construct(ProductRepository $product) {
		$this->product = $product ;
	}

	public function index() {
		return $this->product->all();
	}

	public function create($request) {
		return $this->product->create($request);
	}

	public function update($request, $id) {
      return $this->product->update($id, $request);
	}

	public function read($id) {
     return $this->product->find($id);
	}

	public function delete($id) {
      return $this->product->delete($id);
	}
}