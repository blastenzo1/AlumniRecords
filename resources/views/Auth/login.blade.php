<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href='{{ asset('app.css') }}'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <section class="bg-gradient-to-b from-red-900 from-70% to-bg-white to-30%">
        <div class="min-h-screen flex flex-col justify-center items-center">
            <main class="flex-1 flex flex-col w-full py-6 space-y-8">
                <a href="/" class="flex-none flex justify-between items-center px-6 cursor-pointer">
                    <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="mb-4 w-96">
                </a>

                <div class="flex-1 grid grid-cols-1 place-content-center justify-center items-center space-y-6">
                    <div class="text-center text-white space-y-6">
                        <header class="font-bold text-4xl">LOGIN</header>
                        <p>Welcome back! Please log in to access your account.</p>
                    </div>
                    <form action="{{ route('login.perform') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                            <div class="w-96">
                                <input type="text" name="email" id="email" class="rounded-full py-3 px-8 w-full border border-zinc-700" placeholder="Enter Username"/>
                            </div>
                            <div class="w-96">
                                <input type="password" name="password" id="password" class="rounded-full py-3 px-8 w-full border border-zinc-700" placeholder="Enter Password"/>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button class="w-96 rounded-full py-3 px-8 bg-red-900 text-white" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </main>

            <footer class="w-full bg-red-900 text-right text-white p-4">
                Silliman University Alumni Records.
            </footer>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{-- <script src="js/my-login.js"></script> --}}
</body>
</html>
