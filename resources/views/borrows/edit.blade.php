<!DOCTYPE html>
<html>
<head>
    <title>Edit Borrow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Borrow</h1>

    <form action="{{ route('borrows.update', $borrow) }}" method="POST">
        @csrf
        @method('PUT')

        @include('borrows._form')

        <div class="flex justify-between mt-4">
            <a href="{{ route('borrows.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded">Back</a>
            <button class="px-4 py-2 bg-yellow-500 text-white rounded">
                Update
            </button>
        </div>
    </form>
</div>

</body>
</html>
