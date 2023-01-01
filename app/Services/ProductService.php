<?php
namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService {

    public $productRepository;
    public function __construct(ProductRepository $product)
    {
        $this->productRepository = $product;
    }
    //name string
    public function add($name){
        return $this->productRepository->add($name);
    }

    public function find($title){
        return $this->productRepository->findByTitle($title);
    }
    public function get(){
        return $this->productRepository->get();
    }
}