<?php
namespace App\Mailers;

use App\Task;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer {
    protected $mailer; 
    protected $fromAddress = 'jeffengleberg@hotmail.com';
    protected $fromName = 'New Task';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendTaskInformation($user, Task $task)
    {
        $this->to       = $user->email;
        $this->subject  = "[Task ID: $task->task_id] $task->title";
        $this->view     = 'emails.newTask';
        $this->data     = compact('user', 'task');

        return $this->deliver();
    }

    public function sendtaskComments($taskOwner, $user, task $task, $comment)
    {
        $this->to       = $taskOwner->email;
        $this->subject  = "RE: $task->title (task ID: $task->task_id)";
        $this->view     = 'emails.commentTask';
        $this->data     = compact('taskOwner', 'user', 'task', 'comment');

        return $this->deliver();
    }

    public function sendTaskStatusNotification($taskOwner, Task $task)
    {
        $this->to       = $taskOwner->email;
        $this->subject  = "RE: $task->title (Task ID: $task->task_id)";
        $this->view     = 'emails.statusTask';
        $this->data     = compact('taskOwner', 'task');

        return $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
        });
    }

}