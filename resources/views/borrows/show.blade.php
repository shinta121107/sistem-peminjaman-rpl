<!DOCTYPE html>
<html>
<head>
    <title>Borrow Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Borrow Detail</h1>

    <div class="space-y-2">
        <p><strong>Student:</strong> {{ $borrow->student->name }}</p>
        <p><strong>Item:</strong> {{ $borrow->item->name }}</p>
        <p><strong>Officer:</strong> {{ $borrow->officer->name }}</p>
        <p><strong>Date:</strong> {{ $borrow->borrow_date }}</p>
        <p><strong>Time:</strong> {{ $borrow->pick_up_time }}</p>
        <p><strong>Condition:</strong> {{ $borrow->condition }}</p>
        <p><strong>Status:</strong>
            {{ $borrow->return ? 'Returned' : 'Borrowed' }}
        </p>
    </div>

    <div class="mt-4">
        <a href="{{ route('borrows.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded">
            Back
        </a>
    </div>
</div>

</body>
</html>
