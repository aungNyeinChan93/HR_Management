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
    <div class="p-5">
        <h2>Login</h2>
        <form method="test" action="{{route('testForm')}}">
            <input type="text" name="name" placeholder="name">
            <input type="submit" value="submit" >
        </form>
    </div>
    <hr>

    <button onclick="departments()">fetch with ajax render by blade (departments) </button>
    <button disabled onclick="users()" >fetch with ajax render by blade (users) </button>
    <button disabled onclick="roles()" >fetch with ajax render by blade (roles) </button>
    <button onclick="products()">fetch with ajax render by blade (products) </button>
    <button onclick="allUsers(url)">fetch with ajax render by blade (allUsers) </button>

    <span class="departments"></span>
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

    function departments() {
        $.ajax({
            url: "http://localhost:8000/test/departments",
            type: 'GET',
            success: function(res) {
                $('.departments').html(res);
            }
        });
    }

    function users() {
        $.ajax({
            url: "http://localhost:8000/test/users",
            type: 'GET',
            success: function(res) {
                $('.departments').html(res);
                // console.log(res);
            }
        })
    }

    function roles() {
        $.ajax({
            url: "http://localhost:8000/test/roles",
            type: 'GET',
            success: function(res) {
                // $('.departments').html(res);
                console.log(res);
            }
        })
    }


    function products() {
        $.ajax({
            url: "http://localhost:8000/test/products",
            type: 'GET',
            success: function(res) {
                $('.departments').html(res);
                // console.log(res);
            }
        })
    }


    const url = "http://localhost:8000/api/users"
    let allUsers = async(url )=>{
        let res = await fetch(url);
        let data = await res.json();
        console.log(data.users);
    };
</script>

</html>
