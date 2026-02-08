<form method="POST" action="{{ route('admin.register') }}"
      class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
    @csrf

    <h1 class="text-xl font-bold mb-4">Register Admin</h1>

    <input name="name" placeholder="Name" class="w-full border p-2 mb-3">
    <input name="email" placeholder="Email" class="w-full border p-2 mb-3">
    <input type="password" name="password" placeholder="Password" class="w-full border p-2 mb-3">
    <input type="password" name="password_confirmation" placeholder="Confirm Password"
           class="w-full border p-2 mb-3">

    <button class="w-full bg-green-600 text-white py-2 rounded">
        Register
    </button>
</form>
