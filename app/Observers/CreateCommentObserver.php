<?php

namespace App\Observers;

use App\Models\Comment;
use App\Repositories\CommentRepository;
use App\Repositories\ProductRepository;
use App\Services\FileService;

class CreateCommentObserver
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $fileService = new FileService();
        $count = (new CommentRepository())->totalNumberOfCommentByProductId($comment->product_id);
        $productTitle = ((new ProductRepository())->findById($comment->product_id))->name;
        if($count == 1){
            $fileService->insert("$productTitle:1"); 
            
        }
        else{
            $old = $count - 1;
            $fileService->update("$productTitle:$old","$productTitle:$count");
            
        }
    }

  
}
