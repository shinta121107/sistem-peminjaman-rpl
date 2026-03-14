<!DOCTYPE html>
<html>
<head>
    <title>Detail Peminjaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Detail Peminjaman</h1>

    <div class="space-y-2">
        <p><strong>Barang:</strong> {{ $borrow->item->name }}</p>
        <p><strong>Petugas:</strong> {{ $borrow->officer->name }}</p>
        <p><strong>Tanggal Pinjam:</strong> {{ $borrow->borrow_date }}</p>
        <p><strong>Waktu Ambil:</strong> {{ $borrow->pick_up_time }}</p>
        <p><strong>Kondisi:</strong> {{ $borrow->condition }}</p>
        <p><strong>Status:</strong>
            @if($borrow->return)
                <span class="text-green-600">Sudah Dikembalikan</span>
            @else
                <span class="text-yellow-600">Sedang Dipinjam</span>
            @endif
        </p>
    </div>

    <div class="mt-4">
        <a href="{{ route('student.borrows.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            Kembali ke Daftar Peminjaman
        </a>
    </div>
</div>

</body>
</html>
