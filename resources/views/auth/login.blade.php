<form method="POST" action="{{ route('admin.login') }}"
      class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
    @csrf

    <h1 class="text-xl font-bold mb-4">Admin Login</h1>

    <input type="email" name="email" placeholder="Email"
        class="w-full border p-2 mb-3">

    @error('email')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <input type="password" name="password" placeholder="Password"
        class="w-full border p-2 mb-3">

    <button class="w-full bg-blue-600 text-white py-2 rounded">
        Login
    </button>
</form>
