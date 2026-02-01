<!DOCTYPE html>
<html>
<head>
    <title>Create Return</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Return Item</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('returns.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Borrow Data</label>
            <select name="borrow_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Select Borrow --</option>
                @foreach($borrows as $borrow)
                    <option value="{{ $borrow->id }}">
                        {{ $borrow->student->name }} -
                        {{ $borrow->item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Officer</label>
            <select name="officer_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Select Officer --</option>
                @foreach($officers as $officer)
                    <option value="{{ $officer->id }}">
                        {{ $officer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Return Date</label>
            <input type="date" name="return_date"
                   value="{{ old('return_date') }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Drop Out Time</label>
            <input type="time" name="drop_off_time"
                   value="{{ old('drop_off_time') }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Condition</label>
            <input type="text" name="condition"
                   value="{{ old('condition') }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('returns.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded">
                Back
            </a>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Save
            </button>
        </div>
    </form>
</div>

</body>
</html>
