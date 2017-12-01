<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\task;
use App\Comment;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function postComment(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'comment'   => 'required'
        ]);

            $comment = Comment::create([
                'task_id' 	=> $request->input('task_id'),
                'user_id'   => Auth::user()->id,
                'comment'   => $request->input('comment'),
            ]);

            // send mail if the user commenting is not the task owner
            if ($comment->task->user->id !== Auth::user()->id) {
                $mailer->sendtaskComments($comment->task->user, Auth::user(), $comment->task, $comment);
            }

            return redirect()->back()->with("status", "Your comment has be submitted.");
    }
}
