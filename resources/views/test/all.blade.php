<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All test</title>
</head>

<body>
    <div>
        <h4>Users</h4>
        <ul>
            @foreach ($users as $key => $user)
                <li>{{ $key + 1 }} => {{ $user->name }}</li>
            @endforeach
        </ul>
    </div>

    <button onclick="departments()">fetch with ajax render by blade (departments) </button>

    <span class="departments" ></span>
</body>



{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
        $.ajax({
            url: 'http://localhost:8000/api/users',
            type: 'GET',
            success: function(res) {
                console.log(res.users[0].name);
            }
        });

        function departments(){
            $.ajax({
                url:"http://localhost:8000/test/departments",
                type:'GET',
                success:function(res){
                    $('.departments').html(res);
                }
            });
        }




</script>

</html>
