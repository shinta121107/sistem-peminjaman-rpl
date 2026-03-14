<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-6 rounded shadow w-96">
    <h1 class="text-xl font-bold mb-4 text-center">Student Login</h1>

    @if(session('success'))
        <div class="mb-3 p-2 bg-green-50 text-green-700 text-sm rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-3 p-2 bg-red-50 text-red-700 text-sm rounded">
            @foreach($errors->all() as $err)
                <p>{{ $err }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('student.login.process') }}">
        @csrf

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
               class="w-full mb-3 border border-gray-300 px-3 py-2 rounded @error('email') border-red-500 @enderror">

        <input type="password" name="password" placeholder="Password" required
               class="w-full mb-4 border border-gray-300 px-3 py-2 rounded @error('password') border-red-500 @enderror">

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
