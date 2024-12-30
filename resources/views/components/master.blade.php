<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css','resources/css/pin_code.css', 'resources/js/app.js','resources/js/pin_code.js'])
    @include('sweetalert::alert')

    <link rel="stylesheet" href="">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.css">

    {{-- datatable md --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.material.css">

    {{-- date range picker  --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />




    <title>{{ $title ?? null }}</title>

</head>

<body class="">
    <div class="flex">

        {{-- sidebar --}}
        <aside id="sidebar" style="display: block" class="w-64 bg-gray-900 text-white min-h-screen ">
            <div class="p-4">
                <h2 class="text-2xl font-semibold ">{{ $title ?? null }}</h2>
                <ul class="mt-4">
                    @auth
                        <li class="py-2 flex space-x-4 items-center"><i class="fa-solid fa-home text-red-500"></i><a
                                href="{{ route('home') }}" class="hover:text-gray-400 ">Home</a></li>
                        <li class="py-2 flex space-x-5 items-center"><i class="fa-solid fa-user text-red-500"></i><a
                                href="{{ route('users.index') }}" class="hover:text-gray-400">Users</a></li>
                        @role(['HR', 'CEO'])
                            <li class="py-2 flex space-x-3 items-center"><i class="fa-solid fa-users text-red-500"></i><a
                                    href="{{ route('employees.index') }}" class="hover:text-gray-400">Employees</a></li>
                            <li class="py-2 flex items-center space-x-4"><i class="fa-brands fa-codepen text-red-500"></i><a
                                    href="{{ route('departments.index') }}" class="hover:text-gray-400">Departments</a></li>
                            <li class="py-2 flex items-center space-x-4"><i class="fa-solid fa-star text-red-500"></i><a
                                    href="{{ route('roles.index') }}" class="hover:text-gray-400">Role</a></li>
                            <li class="py-2 flex items-center space-x-4"><i class="fa-solid fa-lock-open text-red-500"></i><a
                                    href="{{ route('permissions.index') }}" class="hover:text-gray-400">Permission</a></li>
                            <li class="py-2 flex items-center space-x-4"><i class="fa-solid fa-building  text-red-500"></i><a
                                    href="{{ route('company.index') }}" class="hover:text-gray-400">Company</a></li>
                            <li class=" inline-block w-[80px] bg-gray-400 text-center py-1 px-2 my-4 rounded hover:bg-gray-600">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="text-white hover:text-gray-400">Logout</button>
                                </form>
                            </li>
                        @endrole
                    @endauth
                </ul>
            </div>
        </aside>
        {{-- sidebar end --}}


        <div class="flex-1">
            <div class="wrapper">
                <nav class="bg-gray-800 px-6 py-2 flex justify-between items-center">
                    <div class="text-xl text-red-500 flex justify-between items-center "><a
                            href="{{ route('welcome.index') }}">HR Management</a>
                        <img src="{{ asset('images/logo.png') }}" class=" ms-2 w-[30px]" alt="" />
                    </div>
                    <ul class="flex space-x-7 mt-3 items-center ">
                        @auth
                            <li><a href="{{ route('home') }}" class="text-white hover:text-gray-400">Home</a></li>
                            <li><a href="{{ route('users.index') }}" class="text-white hover:text-gray-400">User</a></li>
                            @role(['HR', 'CEO'])
                                <li><a href="{{ route('employees.index') }}"
                                        class="text-white hover:text-gray-400">Employees</a></li>
                                <li><a href="{{ route('departments.index') }}"
                                        class="text-white hover:text-gray-400">Departments</a></li>
                                <li><a href="{{ route('roles.index') }}" class="text-white hover:text-gray-400">Role</a></li>
                                <li><a href="{{ route('permissions.index') }}"
                                        class="text-white hover:text-gray-400">Permission</a></li>
                                <li><a href="{{ route('company.index') }}" class="text-white hover:text-gray-400">Company</a>
                                </li>
                            @endrole
                            {{-- <li><a href="/posts" class="text-white hover:text-gray-400">Blog</a></li> --}}
                        @endauth
                    </ul>
                    @guest
                        <div class="flex space-x-6">
                            <a href="/login" class="text-white hover:text-gray-400">Login</a>
                            <a href="/register" class="text-white hover:text-gray-400">Register</a>
                        </div>
                    @endguest

                    <div class="flex space-x-6">
                        <button id="toggleSidebar" class="text-white hover:text-gray-400">
                            <i class="fas fa-bars"></i>
                        </button>
                        @auth
                            <div class="profile-image">
                                @if (auth()->user()->profile_image)
                                    <a href="{{ route('employees.show', auth()->user()->id) }}">
                                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}"
                                            alt="profile_image" class="ms-2 w-[40px] p-1 rounded-xl">
                                    </a>
                                @else
                                    <a href="{{ route('employees.show', auth()->user()->id) }}">
                                        <img src="{{ asset('images/default.png') }}" alt="default"
                                            class="ms-2 w-[40px] p-1 rounded-xl">
                                    </a>
                                @endif
                            </div>
                        @endauth
                    </div>
                </nav>
            </div>

            <main class="min-h-screen">
                {{ $slot }}
            </main>

            <footer class="bg-gray-800 text-white p-4 text-center">
                <p>&copy; 2021 {{ config('app.company.name') }} </p>
            </footer>
        </div>
</body>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js">
</script>



{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


{{-- datatable --}}
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.material.js"></script>

{{-- date range picker --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


{{-- sweet alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- select2  --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

{{-- laragear --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/@laragear/webpass@2/dist/webpass.js" defer></script> --}}



<script>

    $(function($) {
        let token = document.head.querySelector('meta[name="csrf_token"]');
        if (token) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token.content
                }
            });
        } else {
            // console.error('token not found!');
        }
    });

    document.getElementById('toggleSidebar').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        if (sidebar.style.display === 'none') {
            sidebar.style.display = 'block';
        } else {
            sidebar.style.display = 'none';
        }
    });

</script>

{{-- js section for x --}}
{{ $scripts ?? null }}

</html>

