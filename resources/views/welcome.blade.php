<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <!-- <h1>Hello, <?//= $name; ?></h1> -->

    <ul>
        @foreach ($tasks as $task)
            <li><?= $task; ?></li>
        @endforeach
    </ul>
</body>
</html>
