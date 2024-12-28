<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Departments</title>
</head>
<body>
    <div class="container">
        <ul>
            <h1>fetching with ajax and render by blade</h1>
            @foreach ($departments as $department)
                <li>{{$department->title}}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
