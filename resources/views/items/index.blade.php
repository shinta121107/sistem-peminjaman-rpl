<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Master Data Items</h1>
        <a href="{{ route('items.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Item
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
                <th class="border px-4 py-2">Code</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Stock</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $item->code }}</td>
                <td class="border px-4 py-2">{{ $item->name }}</td>
                <td class="border px-4 py-2">{{ $item->stock }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('items.show', $item->id) }}"
                       class="text-blue-600 hover:underline">View</a>

                    <a href="{{ route('items.edit', $item->id) }}"
                       class="text-yellow-600 hover:underline">Edit</a>

                    <form action="{{ route('items.destroy', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
