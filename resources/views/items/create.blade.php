<!DOCTYPE html>
<html>
<head>
    <title>Create Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Create Item</h1>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-medium">Code</label>
            <input type="text" name="code"
                class="w-full border rounded px-3 py-2"
                value="{{ old('code', $items->code ?? '') }}" disabled>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name"
                   class="w-full border rounded px-3 py-2"
                   value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description"
                      class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Stock</label>
            <input type="number" name="stock"
                   class="w-full border rounded px-3 py-2"
                   value="{{ old('stock') }}">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('items.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded">Back</a>

            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save
            </button>
        </div>
    </form>
</div>

</body>
</html>
