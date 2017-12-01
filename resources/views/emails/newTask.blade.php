<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Details</title>
</head>
<body>
    <p>
        Thank you {{ ucfirst($user->name) }} for creating a new tasks. A new task has been opened for you. You will be notified when a response is made by email. The details of your task are shown below:
    </p>

    <p>Title: {{ $task->title }}</p>
    <p>Priority: {{ $task->priority }}</p>
    <p>Status: {{ $task->status }}</p>

    <p>
        You can view the ticket at any time at {{ url('tasks/'. $task->task_id) }}
    </p>

</body>
</html>