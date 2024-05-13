<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success!</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('assets/images/silliman.png') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="h-min-screen bg-gradient-to-b from-red-900 from-70% to-bg-white to-30% flex flex-col justify-between items-stretch">
        <div class="w-full h-screen flex">
            <main class="flex flex-col items-stretch h-full w-full py-6 space-y-8">
                <div class="flex-none flex flex-col ssm:flex-row sm:flex-row justify-between items-center px-6">
                    <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="mb-4 w-96">
                    <a class="bg-white hover:bg-zinc-300 text-red-700 border-none rounded" href="{{ route('login.show') }}">
                        <div class="flex justify-center items-center px-4 py-2 space-x-2">
                            <span>Login</span>
                            <i class="fa fa-sign-in"></i>
                        </div>
                    </a>
                </div>

                <div class="flex-1 flex flex-col items-stretch px-8 space-y-8">
                    <div class="flex-none flex items-center gap-x-4 text-white hover:text-red-300 text-2xl">
                        <i class="fa-solid fa-left-long"></i>
                        <a href="/" class="font-semibold">Go Back</a>
                    </div>
                    <div class="flex-1 bg-white shadow rounded space-y-4 px-4 py-12">
                        <div class="h-full flex flex-col items-center space-y-16">
                            <div class="flex flex-col justify-center items-center text-center gap-6">
                                <div class="text-7xl text-green-500 p-4 rounded-full bg-green-200">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="space-y-4">
                                    <h1 class="text-green-500 text-3xl font-semibold">Alumni Recorded</h1>
                                    <div class="w-full flex justify-center">
                                        <p class="sm:w-8/12 text-lg">The details of the alumni have been successfully recorded in the system. Please proceed to login to review the recorded information.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex justify-center text-center">
                                <a href="/" class="w-5/12 text-lg border border-gray-300 hover:bg-gray-300 rounded py-2 px-4">
                                    Add More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

    </section>

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
