<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Pendaftaran</h1>

    <form wire:submit.prevent="update" class="max-w-md">
        <div class="mb-4">
            <label for="kursus_id" class="block text-gray-700 mb-2">Kursus</label>
            <select wire:model="kursus_id" id="kursus_id" class="w-full p-2 border rounded">
                <option value="">Pilih Kursus</option>
                @foreach($kursuses as $kursus)
                <option value="{{ $kursus->id }}" {{ $kursus->id == $this->kursus_id ? 'selected' : '' }}>
                    {{ $kursus->nama_kursus }}
                </option>
                @endforeach
            </select>
            @error('kursus_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="peserta_id" class="block text-gray-700 mb-2">Peserta</label>
            <select wire:model="peserta_id" id="peserta_id" class="w-full p-2 border rounded">
                <option value="">Pilih Peserta</option>
                @foreach($pesertas as $peserta)
                <option value="{{ $peserta->id }}" {{ $peserta->id == $this->peserta_id ? 'selected' : '' }}>
                    {{ $peserta->nama }}
                </option>
                @endforeach
            </select>
            @error('peserta_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 mb-2">Status</label>
            <select wire:model="status" id="status" class="w-full p-2 border rounded">
                <option value="pending" {{ $this->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $this->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $this->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>
            <a href="{{ route('pendaftarans.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>