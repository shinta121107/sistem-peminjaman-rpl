<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Item</h1>

    <form action="{{ route('items.update', $item) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1 font-medium">Code</label>
        <input type="text"
               class="w-full border rounded px-3 py-2 bg-gray-100"
               value="{{ $item->code }}"
               disabled>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Name</label>
        <input type="text" name="name"
               value="{{ old('name', $item->name) }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Description</label>
        <textarea name="description"
                  class="w-full border rounded px-3 py-2">{{ old('description', $item->description) }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Stock</label>
        <input type="number" name="stock"
               value="{{ old('stock', $item->stock) }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div class="flex justify-between">
        <a href="{{ route('items.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded">
            Back
        </a>

        <button class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
            Update
        </button>
    </div>
</form>

</div>

</body>
</html>
