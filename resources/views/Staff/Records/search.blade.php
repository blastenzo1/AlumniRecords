<!-- search_results.blade.php -->
@extends ('staff.records.index')

@section('content')
<div class="container">
    <h1>Search Results</h1>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Number
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Sex
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Nationality
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
            @foreach ($alumnis as $alumnus)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                    {{ $alumnus->first_name }} {{ $alumnus->middle_name }} {{ $alumnus->last_name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                    {{ $alumnus->email }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                    {{ $alumnus->number }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                    {{ $alumnus->sex }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                    {{ $alumnus->nationality }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                    <a href="{{ url('view-record/' . $alumnus->id) }}" class="text-indigo-600 hover:text-indigo-900">View Details</a>
                    <a href="{{ url('edit-record/' . $alumnus->id) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">Edit</a>
                    <!-- Add delete button or any other action buttons here -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
