<?php
namespace App\Services;

use App\Repositories\CommentRepository;
use App\Repositories\ProductRepository;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class CommentService {
    public $productService;
    public $commentRepository;
    public function __construct(CommentRepository $commentRepository)
    {
        $this->productService = new ProductService(new ProductRepository());
        $this->commentRepository = $commentRepository;
    }
    public function add($productTitle,$body){
       $product = $this->productService->find($productTitle);
       if(!$product){
            $product = $this->productService->add($productTitle);
        }
       
       return response()->json($this->commentRepository->add($product->id,$body));
    }

    public function totalCommentForUser($productTitle){
       $product = $this->productService->find($productTitle);
       if (!$product) 
        return 0;
       return $this->commentRepository->getTotalNumberOfCommentByUserId($product->id);
    }
}