<?php
namespace App\Repositories;

use App\Exceptions\ProductNotFoundException;

use App\Models\Product;
use Exception;

class ProductRepository{

    public function add($name){
        return Product::create([
            'name'  =>  $name
        ]);
        
    }

    public function findByTitle($title){
        try{
            return Product::where('name',$title)->first();
        }catch(ProductNotFoundException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function findById($productId){
        try{
            return Product::find($productId);
        }catch(ProductNotFoundException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function get(){
        return Product::with('comments')->get();
    }

}