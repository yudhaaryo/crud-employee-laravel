<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Departemen</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 min-h-screen p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Tambah Departemen</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('departements.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <input type="text" name="description" value="{{ old('description') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </form>

        <a href="{{ route('departements.index') }}" class="block mt-4 text-blue-600 hover:underline">Kembali ke daftar</a>
    </div>
</body>

</html>
