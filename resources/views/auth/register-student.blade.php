<!DOCTYPE html>
<html>
<head>
    <title>Student Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-6 rounded shadow w-96">
    <h1 class="text-xl font-bold mb-4 text-center">Student Register</h1>

    <form method="POST" action="{{ route('student.register.process') }}">
        @csrf

        <input name="name" placeholder="Name" class="w-full mb-2 border px-3 py-2 rounded">
        <input name="email" placeholder="Email" class="w-full mb-2 border px-3 py-2 rounded">
        <input name="nis" placeholder="NIS" class="w-full mb-2 border px-3 py-2 rounded">
        <input name="class" placeholder="Class" class="w-full mb-2 border px-3 py-2 rounded">
        <input name="phone" placeholder="Phone" class="w-full mb-2 border px-3 py-2 rounded">

        <input type="password" name="password" placeholder="Password"
               class="w-full mb-2 border px-3 py-2 rounded">

        <input type="password" name="password_confirmation"
               placeholder="Confirm Password"
               class="w-full mb-4 border px-3 py-2 rounded">

        <button class="w-full bg-green-600 text-white py-2 rounded">
            Register
        </button>
    </form>
</div>

</body>
</html>
