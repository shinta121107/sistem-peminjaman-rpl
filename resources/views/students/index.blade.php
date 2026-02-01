<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Student List</h1>
        <a href="{{ route('students.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Student
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
                <th class="border px-4 py-2">NIS</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Class</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $student->nis }}</td>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ $student->class }}</td>
                    <td class="border px-4 py-2">{{ $student->email }}</td>
                    <td class="border px-4 py-2">{{ $student->phone }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('students.show', $student) }}"
                           class="px-3 py-1 bg-green-500 text-white rounded">Show</a>

                        <a href="{{ route('students.edit', $student) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

                        <form action="{{ route('students.destroy', $student) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this student?')"
                                    class="px-3 py-1 bg-red-500 text-white rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
