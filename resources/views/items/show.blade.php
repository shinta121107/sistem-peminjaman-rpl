<!DOCTYPE html>
<html>
<head>
    <title>Item Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Item Detail</h1>

    <div class="space-y-2">
        <p><strong>Name:</strong> {{ $item->name }}</p>
        <p><strong>Description:</strong> {{ $item->description ?? '-' }}</p>
        <p><strong>Stock:</strong> {{ $item->stock }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('items.index') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Back
        </a>
    </div>
</div>

</body>
</html>
