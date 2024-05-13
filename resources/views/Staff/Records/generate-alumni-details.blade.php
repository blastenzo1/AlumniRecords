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
        <br>
        <div class="alumni-print space-y-4">
            <div class="space-y-2">
                <span class="text-lg font-semibold">Personal Information</span>
                <div class="space-y-1 grid grid-cols-1 sm:grid-cols-2">
                    <div class="flex gap-4">
                        <span class="text-zinc-500">Full Name:</span>
                        <span class="text-zinc-900">
                            {{ $alumni->first_name }} {{ $alumni->middle_name }} {{ $alumni->last_name }}
                        </span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-zinc-500">Date of Birth:</span>
                        <span class="text-zinc-900">{{ $alumni->birthdate }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-zinc-500">Nationality:</span>
                        <span class="text-zinc-900">{{ $alumni->nationality }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-zinc-500">Sex:</span>
                        <span class="text-zinc-900">{{ $alumni->sex }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-zinc-500">Civil Status:</span>
                        <span class="text-zinc-900">{{ $alumni->status }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-zinc-500">Spouse Complete Name:</span>
                        <span class="text-zinc-900">{{ $alumni->spouse }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-zinc-500">Mobile/Contact Number:</span>
                        <span class="text-zinc-900">{{ $alumni->number }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-zinc-500">Active Email Address:</span>
                        <span class="text-zinc-900">{{ $alumni->email }}</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="space-y-2">
                <div class="space-y-0">
                    <span class="text-lg font-semibold">Address Information</span>
                    <div class="text-lg font-medium">Current Address</div>
                </div>
                @if ($alumni->address)
                    <div class="space-y-1 grid grid-cols-1">
                        <div class="flex gap-4">
                            <span class="text-zinc-500">House/Apt No., Street, Barangay:</span>
                            <span class="text-zinc-900">{{ $alumni->address->current_street }}</span>
                        </div>
                        <div class="flex gap-4">
                            <span class="text-zinc-500">City/Municipality/Town, Region:</span>
                            <span class="text-zinc-900">{{ $alumni->address->current_city }}</span>
                        </div>
                        <div class="flex gap-4">
                            <span class="text-zinc-500">Postal Code:</span>
                            <span class="text-zinc-900">{{ $alumni->address->current_zip_code }}</span>
                        </div>
                        <div class="flex gap-4">
                            <span class="text-zinc-500">Country:</span>
                            <span class="text-zinc-900">{{ $alumni->address->current_country }}</span>
                        </div>
                    </div>
                @else
                    <p>No current address information available.</p>
                @endif
                <br>
                <div class="space-y-0">
                    <div class="text-lg font-medium">Home Address</div>
                </div>
                @if ($alumni->address)
                    <div class="space-y-1 grid grid-cols-1">
                        <div class="flex gap-4">
                            <span class="text-zinc-500">House/Apt No., Street, Barangay:</span>
                            <span class="text-zinc-900">{{ $alumni->address->home_street }}</span>
                        </div>
                        <div class="flex gap-4">
                            <span class="text-zinc-500">City/Municipality/Town, Region:</span>
                            <span class="text-zinc-900">{{ $alumni->address->home_city }}</span>
                        </div>
                        <div class="flex gap-4">
                            <span class="text-zinc-500">Postal Code:</span>
                            <span class="text-zinc-900">{{ $alumni->address->home_zip_code }}</span>
                        </div>
                        <div class="flex gap-4">
                            <span class="text-zinc-500">Country:</span>
                            <span class="text-zinc-900">{{ $alumni->address->home_country }}</span>
                        </div>
                    </div>
                @else
                    <p>No home address information available.</p>
                @endif
            </div>
            <br>
            <div class="space-y-2">
                <div class="space-y-0">
                    <span class="text-lg font-semibold">Educational Attainment</span>
                </div>
                @if ($alumni->educationAttainment)
                    <div class="space-y-1 grid grid-cols-1">
                        <div class="flex gap-4">
                            <span class="text-zinc-500">Course/Degree:</span>
                            <p class="text-zinc-900">{{ $alumni->educationAttainment->course }}</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="text-zinc-500">Year Attended/Graduated:</span>
                            <p class="text-zinc-900">{{ $alumni->educationAttainment->year_attended }}</p>
                        </div>
                    </div>
                @else
                    <p>No education attainment information available.</p>
                @endif
            </div>
        </div>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
</body>
</html>

