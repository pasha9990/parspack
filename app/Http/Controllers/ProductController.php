<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get(){
        $products = (new ProductService(new ProductRepository()))->get();
        return response()->json($products,200);
    }
}
