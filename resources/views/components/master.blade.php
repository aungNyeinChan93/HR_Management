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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.css">
    {{-- datatable md --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.material.css">

    <title>{{ $title }}</title>

</head>

<body class="">
    <div class="flex">
        {{-- sidebar --}}
        <aside id="sidebar" class="w-64 bg-gray-900 text-white min-h-screen ">
            <div class="p-4">
                <h2 class="text-2xl font-semibold ">{{$title}}</h2>
                <ul class="mt-4">
                    <li class="py-2 flex space-x-4 items-center"><i class="fa-solid fa-home text-red-500"></i><a href="/" class="hover:text-gray-400 ">Home</a></li>
                    <li class="py-2 flex space-x-5 items-center"><i class="fa-solid fa-user text-red-500"></i><a href="{{ route('users.index') }}" class="hover:text-gray-400">Users</a></li>
                    <li class="py-2 flex space-x-4 items-center"><i class="fa-solid fa-users text-red-500"></i><a href="{{ route('employees.index') }}" class="hover:text-gray-400">Employees</a></li>
                    <li class="py-2"><a href="/services" class="hover:text-gray-400">Employees</a></li>
                    <li class="py-2"><a href="#" class="hover:text-gray-400">Blog</a></li>
                </ul>
            </div>
        </aside>
        {{-- sidebar end --}}


        <div class="flex-1">
            <div class="wrapper">
                <nav class="bg-gray-800 px-6 py-2 flex justify-between items-center">
                    <div class="text-xl text-red-500 flex justify-between items-center ">HR Management <img
                            src="{{ asset('images/logo.png') }}" class=" ms-2 w-[30px]" alt=""></div>
                    @auth
                        <ul class="flex space-x-7 mt-3 items-center ">
                            <li><a href="/" class="text-white hover:text-gray-400">Home</a></li>
                            <li><a href="{{ route('users.index') }}" class="text-white hover:text-gray-400">User</a></li>
                            <li><a href="{{route('employees.index')}}" class="text-white hover:text-gray-400">Employees</a></li>
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
                            <button id="toggleSidebar" class="text-white hover:text-gray-400">
                                <i class="fas fa-bars"></i>
                            </button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js"></script>



{{-- jquery --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


{{-- datatable --}}
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.material.js"></script>


<script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        if (sidebar.style.display === 'none') {
            sidebar.style.display = 'block';
        } else {
            sidebar.style.display = 'none';
        }
    });
</script>

{{-- js section --}}
{{ $scripts ?? null }}

</html>
