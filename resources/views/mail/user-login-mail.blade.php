<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login Mail</title>
</head>

<body>
    <div class="wrapper">
        <h3>User Login Mail</h3>
        <p>Dear {{ $user->name }},</p>
        <p>You have successfully logged in at {{ $user->created_at }}.</p>
        <p>Thank you for using our application.</p>
        <p>Best regards,</p>
        <p>Admin</p>
        <p><small>{{ env('APP_NAME') }} - {{ env('APP_URL') }}</small></p>
    </div>
</body>

</html>
