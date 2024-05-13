<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <title>View Record</title>

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/silliman.png') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>
<body class="relative bg-gray-100 flex justify-start">
    <main class="flex-1 flex flex-col rounded-lg shadow">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">{{ $title }}</h2>
            <div class="flex gap-x-2">
                <span class="text-xl font-semibold">Date:</span>
                <span class="text-xl">{{ $date }}</span>
            </div>
        </div>
        <table class="table table-bordered">
            <thead class="bg-red-500">
                <tr class="text-left text-sm text-white whitespace-nowrap">
                    <th scope="col" class="px-6 py-3">First Name</th>
                    <th scope="col" class="px-6 py-3">Middle Name</th>
                    <th scope="col" class="px-6 py-3">Last Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">User Type</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="border border-zinc-500">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->first_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->middle_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->last_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->user_type }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
</body>
</html>

