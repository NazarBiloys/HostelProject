<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageComment;
use Auth;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::where('publish','1')->paginate(3);

        return view('layouts.comment',['comments'=>$comments]);
    }

    /**
     * @param StorageComment $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorageComment $request)
    {
        $new = new Comment();
        $new->users_id = Auth::user()->id;
        $new->comment = $request->get('comment');
        $new->save();

        return redirect()->back()->with('status','Ваш коментарій буде скоро добавлений');
    }
}
