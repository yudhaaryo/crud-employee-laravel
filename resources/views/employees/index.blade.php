<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 min-h-screen p-4 sm:p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Data Pegawai</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('employees.create') }}"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
            Tambah Pegawai
        </a>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-400">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-400 px-4 py-2 text-left">Nama</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Email</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Alamat</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">No HP</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Jabatan</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-400 px-4 py-2">{{ $employee->name }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $employee->email }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $employee->address }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $employee->phone }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $employee->position }}</td>
                            <td class="border border-gray-400 px-4 py-2 space-x-2">
                                <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
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
        </div>
    </div>
</body>

</html>
