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
        $this->to = $user->email;
        $this->subject = "[Task ID: $task->task_id] $task->title";
        $this->view = 'emails.newTask';
        $this->data = compact('user', 'task');

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