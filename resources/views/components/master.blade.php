<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />

    <title>Document</title>

</head>

<body class="">
    <div class="wrapper">
        <nav class="bg-gray-800 p-4 flex justify-between items-center">
            <div class="text-2xl text-red-500 ">HR Management</div>
            @auth
                <ul class="flex space-x-7">
                    <li><a href="/" class="text-white hover:text-gray-400">Home</a></li>
                    <li><a href="/about" class="text-white hover:text-gray-400">About</a></li>
                    <li><a href="/services" class="text-white hover:text-gray-400">Services</a></li>
                    <li><a href="/posts" class="text-white hover:text-gray-400">Blog</a></li>
                </ul>
            @endauth
            @guest
                <div class="flex space-x-6">
                    <a href="/login" class="text-white hover:text-gray-400">Login</a>
                    <a href="/register" class="text-white hover:text-gray-400">Register</a>
                </div>
            @endguest
            @auth
                <div class="flex space-x-6">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-400">Logout</button>
                    </form>
                </div>
            @endauth
        </nav>
    </div>

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center">
        <p>&copy; 2021 Company Name</p>
    </footer>
    </div>
</body>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>

</html>
