<!DOCTYPE html>
<html>
<head>
    <title>Returns</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Return List</h1>
        <a href="{{ route('returns.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Return Item
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">Student</th>
                <th class="border px-3 py-2">Item</th>
                <th class="border px-3 py-2">Officer</th>
                <th class="border px-3 py-2">Return Date</th>
                <th class="border px-3 py-2">Time</th>
                <th class="border px-3 py-2">Condition</th>
                <th class="border px-3 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($returns as $return)
                <tr class="text-center">
                    <td class="border px-3 py-2">
                        {{ $return->borrow->student->name }}
                    </td>
                    <td class="border px-3 py-2">
                        {{ $return->borrow->item->name }}
                    </td>
                    <td class="border px-3 py-2">
                        {{ $return->officer->name }}
                    </td>
                    <td class="border px-3 py-2">
                        {{ $return->return_date }}
                    </td>
                    <td class="border px-3 py-2">
                        {{ $return->drop_off_time }}
                    </td>
                    <td class="border px-3 py-2">
                        {{ $return->condition }}
                    </td>
                    <td class="border px-3 py-2 space-x-2">
                        <a href="{{ route('returns.show', $return) }}"
                           class="px-3 py-1 bg-green-500 text-white rounded">Show</a>

                        <a href="{{ route('returns.edit', $return) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

                        <form action="{{ route('returns.destroy', $return) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this data?')"
                                    class="px-3 py-1 bg-red-500 text-white rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-4 text-center">
                        No data available
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
