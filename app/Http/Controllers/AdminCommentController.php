<?php

namespace App\Http\Controllers;


use App\Comment;


class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comments.index',compact('comments'));
    }

    public function toogle(Comment $new)
    {
        $new->toogleStatus();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back()->with('status','Ви вдало видалили коментарій');
    }
}
