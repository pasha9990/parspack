<?php
namespace App\Repositories;

use App\Exceptions\AddCommentException;
use App\Models\Comment;
use App\Models\Product;
use Exception;

class CommentRepository{

   public function add($productId,$body,){
    try{
    return Comment::create([
        'product_id'    =>  $productId,
        'user_id'       =>  auth()->user()->id,
        'body'          =>  $body
    ]);
    }catch(AddCommentException $e){
        throw new Exception($e->getMessage());
    }
   }

   public function getTotalNumberOfCommentByUserId($productId){
        return auth()->user()->comments->where('product_id',$productId)->count();
   }
   public function totalNumberOfCommentByProductId($productId){
    return Comment::where('product_id',$productId)->count();
}
}