<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Task;

class NewTask extends Mailable
{
    use Queueable, SerializesModels;

        protected $mailer; 
        protected $fromAddress = 'jeffengleberg@hotmail.com';
        protected $fromName = 'Service Quest';
        protected $to;
        protected $subject;
        protected $view;
        protected $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
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

//     /**
//      * Build the message.
//      *
//      * @return $this
//      */
//     public function build()
//     {
//         return $this->view('view.name');
//     }
// }
