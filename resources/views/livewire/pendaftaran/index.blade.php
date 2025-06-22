<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Daftar Pendaftaran</h1>
                    <a href="{{ route('pendaftarans.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Tambah Pendaftaran
                    </a>
                </div>

                <div class="mb-4">
                    <input type="text" wire:model.live="search" placeholder="Cari pendaftaran..." class="w-full p-2 border rounded">
                </div>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kursus</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peserta</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($pendaftarans as $pendaftaran)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftaran->kursus->nama_kursus }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftaran->peserta->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full 
                                        {{ $pendaftaran->status == 'approved' ? 'bg-green-100 text-green-800' : 
                                        ($pendaftaran->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $pendaftaran->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('pendaftarans.edit', $pendaftaran->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a>
                                        <livewire:pendaftaran.delete :pendaftaran="$pendaftaran" :key="$pendaftaran->id" />
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center">Tidak ada data pendaftaran</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $pendaftarans->links() }}
                </div>
            </div>
        </div>
    </div>
</div>