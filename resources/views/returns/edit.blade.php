<!DOCTYPE html>
<html>
<head>
    <title>Edit Return</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Return</h1>

    <form action="{{ route('returns.update', $return) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Officer</label>
            <select name="officer_id" class="w-full border rounded px-3 py-2">
                @foreach($officers as $officer)
                    <option value="{{ $officer->id }}"
                        @selected($return->officer_id == $officer->id)>
                        {{ $officer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Return Date</label>
            <input type="date" name="return_date"
                   value="{{ $return->return_date }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Drop Out Time</label>
            <input type="time" name="drop_off_time"
                   value="{{ $return->drop_off_time }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Condition</label>
            <input type="text" name="condition"
                   value="{{ $return->condition }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('returns.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded">
                Back
            </a>

            <button class="px-4 py-2 bg-yellow-500 text-white rounded">
                Update
            </button>
        </div>
    </form>
</div>

</body>
</html>
