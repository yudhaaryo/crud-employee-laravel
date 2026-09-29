<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Departemen</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 min-h-screen p-4 sm:p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Data Departemen</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('departements.create') }}"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
            Tambah Departemen
        </a>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-400">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-400 px-4 py-2 text-left">Nama</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Description</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departements as $departement)
                                        <tr class="hover:bg-gray-100">
                                            <td class="border border-gray-400 px-4 py-2">{{ $departement->name }}</td>
                                            <td class="border border-gray-400 px-4 py-2">{{ $departement->description }}</td>
                                            <td class="border border-gray-400 px-4 py-2 space-x-2">
                                                <a href="{{ route('departements.edit', $departement->id) }}"
                                                    class="text-blue-600 hover:underline">Edit</a>
                                                <form action="{{ route('departements.destroy', $departement->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                                        class="text-red-600 hover:underline">Hapus</button>
                                                </form>
                                            </td>

                                        </tr>
                    @endforeach
                </tbody>
            </table>
                                    <a href="{{ route('employees.index') }}" class="block mt-4 text-blue-600 hover:underline">Kembali ke daftar employee</a>

        </div>
    </div>
</body>

</html>
