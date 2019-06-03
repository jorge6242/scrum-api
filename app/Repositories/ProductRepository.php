<?php

namespace App\Repositories;

use App\Product;

class ProductRepository  {
  
    protected $post;

    public function __construct(Product $product) {
      $this->product = $product;
    }

    public function find($id) {
      return $this->product->find($id);
    }

    public function create($attributes) {
      return $this->product->create($attributes);
    }

    public function update($id, array $attributes) {
      return $this->product->find($id)->update($attributes);
    }
  
    public function all() {
      return $this->product->all();
    }

    public function delete($id) {
     return $this->product->find($id)->delete();
    }
}