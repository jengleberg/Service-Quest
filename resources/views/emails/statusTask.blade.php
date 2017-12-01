<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppor Task Status</title>
</head>
<body>
    <p>
        Hello {{ ucfirst($taskOwner->name) }},
    </p>
    <p>
        Your task with ID #{{ $task->task_id }} has been marked has resolved and closed.
    </p>
</body>
</html>