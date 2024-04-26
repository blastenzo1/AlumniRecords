<form method="POST" action="{{ url('delete-chapter/' . $chapter->id) }}" class="p-4 w-full max-w-md max-h-full">
    @csrf
    @method('DELETE')
    <div class="bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="p-4 md:p-5 space-y-2">
            <div class="text-lg font-normal text-gray-500 dark:text-gray-400">
                <div class="flex gap-2 whitespace-nowrap">
                    <header>Delete Chapter</header>
                    <span class="text-red-600">({{ $chapter->name }})</span>
                </div>
            </div>
            <p class="text-gray-500">Are you sure you want to delete this alumni? This action will permanently remove all items and data associated with it.</p>
            <div class="flex justify-end gap-4">
                <button data-modal-hide="delete-modal{{ $chapter->name }}" type="button" class="py-2 px-3 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-zinc-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                <button data-modal-hide="delete-modal{{ $chapter->name }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center py-2 px-3 text-center">Delete</button>
            </div>
        </div>
    </div>
</form>
