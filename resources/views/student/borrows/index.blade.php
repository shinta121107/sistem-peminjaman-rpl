<!DOCTYPE html>
<html>
<head>
    <title>Daftar Peminjaman Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Daftar Peminjaman Saya</h1>
        <a href="{{ route('student.dashboard') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">Barang</th>
                <th class="border px-3 py-2">Petugas</th>
                <th class="border px-3 py-2">Tanggal Pinjam</th>
                <th class="border px-3 py-2">Waktu Ambil</th>
                <th class="border px-3 py-2">Status</th>
                <th class="border px-3 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrows as $borrow)
                <tr class="text-center">
                    <td class="border px-3 py-2">{{ $borrow->item->name }}</td>
                    <td class="border px-3 py-2">{{ $borrow->officer->name }}</td>
                    <td class="border px-3 py-2">{{ $borrow->borrow_date }}</td>
                    <td class="border px-3 py-2">{{ $borrow->pick_up_time }}</td>
                    <td class="border px-3 py-2">
                        @if($borrow->return)
                            <span class="px-2 py-1 bg-green-200 text-green-800 rounded">
                                Sudah Dikembalikan
                            </span>
                        @else
                            <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded">
                                Sedang Dipinjam
                            </span>
                        @endif
                    </td>
                    <td class="border px-3 py-2">
                        <a href="{{ route('student.borrows.show', $borrow) }}"
                           class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">
                        Belum ada data peminjaman.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
