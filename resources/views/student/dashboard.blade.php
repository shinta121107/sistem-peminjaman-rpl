<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">

<div class="max-w-4xl mx-auto">
    <div class="bg-white p-6 rounded shadow mb-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Dashboard Student</h1>
        <form method="POST" action="{{ route('student.logout') }}" class="inline">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow">
        <p class="mb-4 text-gray-600">Selamat datang di halaman dashboard. Anda dapat melihat daftar peminjaman Anda di bawah ini.</p>
        <a href="{{ route('student.borrows.index') }}"
           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Lihat Daftar Peminjaman Saya
        </a>
    </div>
</div>

</body>
</html>
