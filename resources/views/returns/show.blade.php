<!DOCTYPE html>
<html>
<head>
    <title>Return Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Return Detail</h1>

    <div class="space-y-2">
        <p><strong>Student:</strong>
            {{ $returns->borrow->student->name }}</p>
        <p><strong>Item:</strong>
            {{ $returns->borrow->item->name }}</p>
        <p><strong>Officer:</strong>
            {{ $returns->officer->name }}</p>
        <p><strong>Return Date:</strong>
            {{ $returns->return_date }}</p>
        <p><strong>Time:</strong>
            {{ $returns->drop_off_time }}</p>
        <p><strong>Condition:</strong>
            {{ $returns->condition }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('returns.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded">
            Back
        </a>
    </div>
</div>

</body>
</html>
