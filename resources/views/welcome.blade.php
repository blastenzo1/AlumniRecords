<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Up Form</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
    <section class="h-min-screen bg-gradient-to-b from-red-900 from-70% to-bg-white to-30% flex flex-col justify-between items-stretch">
        <div class="w-full h-screen flex">
            <main class="w-full py-6 space-y-8">
                <div class="flex justify-between items-center px-6">
                    <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="mb-4 w-96">
                    <a class="bg-white hover:bg-zinc-300 flex justify-center items-center text-red-700 border-none px-4 py-2 rounded space-x-2" href="{{ route('login.show') }}">
                        <span>Login</span>
                        <i class="fa fa-sign-in"></i>
                    </a>
                </div>

                @livewire('multi-step-form')
            </main>

            {{-- <footer class="block w-full bg-red-900 text-right text-white p-4">
                Silliman University Alumni Records.
            </footer> --}}
        </div>
    </section>

    @livewireScripts
    <script>
        // Initialization for ES Users
        import { Input, Ripple, initMDB } from "mdb-ui-kit";

        initMDB({ Input, Ripple });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
    <script>
        document.getElementById('birthdate').addEventListener('change', function() {
            this.value = this.value + ' ';
        });
    </script>
</body>
</html>
