<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-6 rounded shadow w-96">
    <h1 class="text-xl font-bold mb-4 text-center">Student Login</h1>

    @error('email')
        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
    @enderror

    <form method="POST" action="{{ route('student.login.process') }}">
        @csrf

        <input type="email" name="email" placeholder="Email"
               class="w-full mb-3 border px-3 py-2 rounded">

        <input type="password" name="password" placeholder="Password"
               class="w-full mb-4 border px-3 py-2 rounded">

        <button class="w-full bg-blue-600 text-white py-2 rounded">
            Login
        </button>
    </form>

    <p class="text-sm mt-4 text-center">
        Belum punya akun?
        <a href="{{ route('student.register') }}" class="text-blue-600">Register</a>
    </p>
</div>

</body>
</html>
