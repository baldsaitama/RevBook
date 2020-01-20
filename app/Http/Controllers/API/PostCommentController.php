<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CommentRepository;
use App\Http\Controllers\Controller;
class PostCommentController extends Controller{
    function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }


    public function store(Request $request){
        $this->comment->store($request);
        return back();
    }
}
