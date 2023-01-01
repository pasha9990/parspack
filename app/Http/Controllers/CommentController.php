<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
    }

    public function add(CommentRequest $request){
        $commentService = new CommentService(new CommentRepository());
        return $commentService->add($request->product,$request->comment);
    }
}
