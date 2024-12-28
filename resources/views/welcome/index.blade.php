<x-master>
    <x-slot:title>
        Welcome Page
    </x-slot:title>

    <div class="container mx-auto">
        <x-header>
            Welcome Page
        </x-header>

        <div class="my-5">
            <section class="bg-gray-900 text-white">
                <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
                    <div class="mx-auto max-w-3xl text-center">
                        <h1
                            class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl">
                            Understand User Flow.

                            <span class="sm:block"> Increase Conversion. </span>
                        </h1>

                        <p class="mx-auto mt-4 max-w-xl sm:text-xl/relaxed">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
                            numquam ea!
                        </p>

                        @guest
                            <div class="mt-8 flex flex-wrap justify-center gap-4">
                                <a class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
                                    href="/login">
                                    Login
                                </a>

                                <a class="block w-full rounded border border-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
                                    href="/register">
                                    Register
                                </a>
                            </div>
                        @endguest

                        @auth
                            <div class="mt-8 flex flex-wrap justify-center gap-4">

                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
                                        href="/logout">
                                        Logout
                                    </button>
                                </form>


                                <form action="{{route('webauthn.register')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
                                    href="/login">
                                    Web Authn Register
                                </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </section>

        </div>

    </div>

</x-master>
