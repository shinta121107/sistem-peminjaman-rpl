<!DOCTYPE html>
<html>
<head>
    <title>Student Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Student Detail</h1>

    <div class="space-y-3">
        <p><strong>NIS:</strong> {{ $student->nis }}</p>
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Class:</strong> {{ $student->class }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Phone:</strong> {{ $student->phone }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('students.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded">
            Back
        </a>
    </div>
</div>

</body>
</html>
