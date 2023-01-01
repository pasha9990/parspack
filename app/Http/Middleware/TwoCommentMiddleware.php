<?php

namespace App\Http\Middleware;

use App\Repositories\CommentRepository;
use App\Services\CommentService;
use Closure;
use Illuminate\Http\Request;

class TwoCommentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if((new CommentService(new CommentRepository()))->totalCommentForUser($request->product) < 2)
            return $next($request);
        return response()->json('{message:you cannot submit more than 2 commant for every product}',422);
    }
}
