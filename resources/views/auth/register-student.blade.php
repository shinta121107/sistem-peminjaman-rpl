<!DOCTYPE html>
<html>
<head>
    <title>Student Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-6 rounded shadow w-96">
    <h1 class="text-xl font-bold mb-4 text-center">Student Register</h1>

    @if($errors->any())
        <div class="mb-3 p-2 bg-red-50 text-red-700 text-sm rounded">
            @foreach($errors->all() as $err)
                <p>{{ $err }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('student.register.process') }}">
        @csrf

        <input name="name" placeholder="Nama" value="{{ old('name') }}" required
               class="w-full mb-2 border border-gray-300 px-3 py-2 rounded @error('name') border-red-500 @enderror">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
               class="w-full mb-2 border border-gray-300 px-3 py-2 rounded @error('email') border-red-500 @enderror">
        <input name="nis" placeholder="NIS" value="{{ old('nis') }}" required
               class="w-full mb-2 border border-gray-300 px-3 py-2 rounded @error('nis') border-red-500 @enderror">
        <input name="class" placeholder="Kelas" value="{{ old('class') }}" required
               class="w-full mb-2 border border-gray-300 px-3 py-2 rounded @error('class') border-red-500 @enderror">
        <input name="phone" placeholder="No. Telepon" value="{{ old('phone') }}" required
               class="w-full mb-2 border border-gray-300 px-3 py-2 rounded @error('phone') border-red-500 @enderror">

        <input type="password" name="password" placeholder="Password" required
               class="w-full mb-2 border border-gray-300 px-3 py-2 rounded @error('password') border-red-500 @enderror">

        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
               class="w-full mb-4 border border-gray-300 px-3 py-2 rounded">

        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
            Daftar
        </button>
    </form>

    <p class="text-sm mt-4 text-center">
        Sudah punya akun?
        <a href="{{ route('student.login') }}" class="text-blue-600">Login</a>
    </p>
</div>

</body>
</html>
