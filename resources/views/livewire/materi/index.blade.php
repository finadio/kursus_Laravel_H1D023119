<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materi Kursus: ') }}{{ $kursus->nama_kursus }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Materi Kursus: {{ $kursus->nama_kursus }}</h1>
                        <a href="{{ route('materis.create', ['kursus' => $kursus->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Tambah Materi
                        </a>
                    </div>

                    <div class="mb-4">
                        <input type="text" wire:model.live="search" placeholder="Cari materi..." class="w-full p-2 border rounded">
                    </div>

                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($materis as $materi)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $materi->judul }}</td>
                                    <td class="px-6 py-4">{{ $materi->deskripsi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($materi->file_path)
                                        <a href="{{ asset('storage/'.$materi->file_path) }}" target="_blank" class="text-blue-500 hover:text-blue-600">
                                            Download
                                        </a>
                                        @else
                                        Tidak ada file
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <livewire:materi.delete :materi="$materi" :key="$materi->id" />
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center">Tidak ada data materi</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $materis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>