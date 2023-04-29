<thead class="bg-gray-50">
    <tr>
        @foreach ($columns as $column)
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{ $column }}</th>
        @endforeach
        <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-right">
            <a href="{{ $buttonLink }}">
                <button
                    class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ $buttonText }}
                </button>
            </a>
        </th>
    </tr>
</thead>