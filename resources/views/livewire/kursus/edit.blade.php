<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Kursus</h1>

    <form wire:submit.prevent="update" class="max-w-md">
        <div class="mb-4">
            <label for="nama_kursus" class="block text-gray-700 mb-2">Nama Kursus</label>
            <input type="text" wire:model="nama_kursus" id="nama_kursus" class="w-full p-2 border rounded">
            @error('nama_kursus') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="durasi" class="block text-gray-700 mb-2">Durasi (jam)</label>
            <input type="number" wire:model="durasi" id="durasi" class="w-full p-2 border rounded">
            @error('durasi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="instruktur_id" class="block text-gray-700 mb-2">Instruktur</label>
            <select wire:model="instruktur_id" id="instruktur_id" class="w-full p-2 border rounded">
                <option value="">Pilih Instruktur</option>
                @foreach($instrukturs as $instruktur)
                <option value="{{ $instruktur->id }}" {{ $instruktur->id == $this->instruktur_id ? 'selected' : '' }}>
                    {{ $instruktur->nama }}
                </option>
                @endforeach
            </select>
            @error('instruktur_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="biaya" class="block text-gray-700 mb-2">Biaya</label>
            <input type="number" wire:model="biaya" id="biaya" step="0.01" class="w-full p-2 border rounded">
            @error('biaya') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>
            <a href="{{ route('kursuses.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>