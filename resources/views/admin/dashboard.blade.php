<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Ecosmart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-6">
    <x-swal />
    <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
    <a href="{{ route('home') }}" class="text-white hover:text-gray-800 flex items-center gap-2 bg-ijotuabg rounded-2xl h-10 px-6 transition-colors">
        <i class="fas fa-arrow-left"></i>
        <span class="sm:inline">Kembali ke Home</span>
    </a>
</div>

    <div class="mb-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-3 text-gray-700">Tambah User</h2>
        <form action="{{ route('admin.add.user') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Nama" class="w-full px-4 py-2 border rounded">
            <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 border rounded">
            <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border rounded">
            <select name="role" class="w-full px-4 py-2 border rounded">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Tambah</button>
        </form>
    </div>

    <section class="mb-12">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Manajemen User</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-600 text-gray-700 text-center">
    @foreach ($users as $user)
    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 align-middle">{{ $user->id }}</td>
        <td class="px-6 py-4 align-middle">{{ $user->name }}</td>
        <td class="px-6 py-4 align-middle">{{ $user->email }}</td>
        <td class="px-6 py-4 align-middle capitalize">{{ $user->role }}</td>
        <td class="px-6 py-4 space-x-2 align-middle">
            <button onclick="toggleModal('editUserModal{{ $user->id }}')"
                class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</button>
            <form action="{{ route('admin.delete.user', $user->id) }}" method="POST" class="inline-block"
                onsubmit="return confirm('Yakin mau hapus user ini?')">
                @method('DELETE')
                @csrf 
                <button type="submit"
                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
            </form>
        </td>
    </tr>
    <div id="editUserModal{{ $user->id }}" class="fixed inset-0 flex items-center justify-center hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md border">
                <h2 class="text-xl font-semibold mb-4">Edit User</h2>
                <form action="{{ route('admin.update.user', $user->id) }}" method="POST" class="space-y-4">
                    @method('PUT')
                    @csrf
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 mb-2 py-2 border rounded" required>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 mb-2 py-2 border rounded"
                        required>
                        <select name="role" class="w-full px-4 py-2 border rounded">
    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
</select>
                    <div class="flex justify-end gap-2 mt-2">
                        <button type="button" onclick="toggleModal('editUserModal{{ $user->id }}')"
                            class="px-4 py-2 border rounded text-gray-600 hover:bg-gray-500 hover:text-white">Batal</button>
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</tbody>

            </table>
        </div>


    </section>

    <div class="mb-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-3 text-gray-700">Tambah Klasifikasi</h2>
        <form action="{{ route('admin.add.klasifikasi') }}" method="POST"  class="space-y-4">
            @csrf
            <input type="text" name="itemid" placeholder="Item ID" class="w-full px-4 py-2 border rounded" required>
            <input type="text" name="name" placeholder="Nama Klasifikasi" class="w-full px-4 py-2 border rounded" required>
            <textarea name="description" rows="3" placeholder="Deskripsi"class="w-full px-4 py-2 border rounded"></textarea>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Tambah</button>
        </form>
    </div>

    <section>
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Manajemen Klasifikasi</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3 text-nowrap">Item ID</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Created At</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700 text-center">
    @foreach ($klasifikasis as $item)
    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 align-middle">{{ $item->id }}</td>
        <td class="px-6 py-4 align-middle">{{ $item->itemid }}</td>
        <td class="px-6 py-4 align-middle">{{ $item->name }}</td>
        <td class="px-6 py-4 align-middle">{{ $item->description }}</td>
        <td class="px-6 py-4 align-middle">{{ $item->created_at->format('d M Y H:i') }}</td>
        <td class="px-6 py-4 align-middle">
            <div class="flex justify-center items-center gap-2 flex-wrap">
                <button type="button" onclick="toggleModal('editKlasifikasiModal{{ $item->id }}')"
                    class="bg-yellow-400 text-white px-6 py-1 rounded hover:bg-yellow-500">
                    Edit
                </button>
                <form action="{{ route('admin.klasifikasi.delete', $item->id) }}" method="POST"
                    onsubmit="return confirm('Yakin mau hapus data ini?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">Hapus</button>
                </form>
            </div>
        </td>
    </tr>
    <div id="editKlasifikasiModal{{ $item->id }}" class="fixed inset-0 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md border">
            <h2 class="text-xl font-semibold mb-4">Edit Klasifikasi</h2>
            <form action="{{ route('admin.update.klasifikasi', $item->id) }}" method="POST" class="space-y-4">
                @method('PUT')
                @csrf 
                <input type="text" name="itemid" value="{{ old('itemid', $item->itemid) }}" placeholder="Item ID" class="w-full px-4 py-2 mb-2 border rounded">
                <input type="text" name="name" value="{{ old('name', $item->name) }}" placeholder="Nama Klasifikasi" class="w-full px-4 py-2 mb-2 border rounded">
                <textarea name="description" rows="3" placeholder="Deskripsi" class="w-full px-4 py-2 mb-2 border rounded">{{ old('description', $item->description) }}</textarea>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="toggleModal('editKlasifikasiModal{{ $item->id }}')" class="px-6 py-2 border rounded text-gray-600 hover:bg-gray-700 hover:text-white">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
            <button type="button" onclick="toggleModal('editKlasifikasiModal{{ $item->id }}')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>
    </div>
    @endforeach
</tbody>

            </table>
        </div>
    </section>
    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>