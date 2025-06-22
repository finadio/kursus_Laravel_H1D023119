<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Daftar Instruktur</h1>
                    <a href="{{ route('instrukturs.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Tambah Instruktur
                    </a>
                </div>

                <div class="mb-4">
                    <input type="text" wire:model.live="search" placeholder="Cari instruktur..." class="w-full p-2 border rounded">
                </div>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($instrukturs as $instruktur)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $instruktur->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $instruktur->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('instrukturs.edit', $instruktur->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a>
                                        <livewire:instruktur.delete :instruktur="$instruktur" :key="$instruktur->id" />
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center">Tidak ada data instruktur</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $instrukturs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>