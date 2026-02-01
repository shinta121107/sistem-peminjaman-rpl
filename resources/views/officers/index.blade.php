<!DOCTYPE html>
<html>
<head>
    <title>Officers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Officer List</h1>
        <a href="{{ route('officers.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Officer
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($officers as $officer)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $officer->name }}</td>
                    <td class="border px-4 py-2">{{ $officer->email }}</td>
                    <td class="border px-4 py-2">{{ $officer->phone }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('officers.show', $officer) }}"
                           class="px-3 py-1 bg-green-500 text-white rounded">Show</a>

                        <a href="{{ route('officers.edit', $officer) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

                        <form action="{{ route('officers.destroy', $officer) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this officer?')"
                                    class="px-3 py-1 bg-red-500 text-white rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-4">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
