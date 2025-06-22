<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Materi untuk Kursus: ') }}{{ $kursus->nama_kursus }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Tambah Materi untuk Kursus: {{ $kursus->nama_kursus }}</h1>

                    <form wire:submit="save" class="max-w-md">
                        <div class="mb-4">
                            <label for="judul" class="block text-gray-700 mb-2">Judul Materi</label>
                            <input type="text" wire:model="judul" id="judul" class="w-full p-2 border rounded">
                            @error('judul') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-gray-700 mb-2">Deskripsi</label>
                            <textarea wire:model="deskripsi" id="deskripsi" rows="4" class="w-full p-2 border rounded"></textarea>
                            @error('deskripsi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="file" class="block text-gray-700 mb-2">File Materi (opsional)</label>
                            <input type="file" wire:model="file" id="file" class="w-full p-2 border rounded">
                            @error('file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            @if ($file)
                                <div class="mt-2 text-sm text-gray-600">
                                    File: {{ $file->getClientOriginalName() }} ({{ round($file->getSize() / 1024, 2) }} KB)
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Simpan
                            </button>
                            <a href="{{ route('materis.index', ['kursus' => $kursus->id]) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>