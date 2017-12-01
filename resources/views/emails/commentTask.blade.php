<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Comment on Task</title>
</head>
<body>
    <p>
        {{ $comment->comment }}
    </p>

    ---
    <p>Replied by: {{ $user->name }}</p>

    <p>Title: {{ $task->title }}</p>
    <p>Title: {{ $task->task_id }}</p>
    <p>Status: {{ $task->status }}</p>

    <p>
        You can view the task at any time at {{ url('tasks/'. $task->task_id) }}
    </p>

</body>
</html>