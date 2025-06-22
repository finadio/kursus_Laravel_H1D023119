<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-6">Tambah Pendaftaran</h1>

                @if (session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form wire:submit.prevent="save" class="max-w-md">
                    <div class="mb-4">
                        <label for="kursus_id" class="block text-gray-700 mb-2">Kursus</label>
                        <select wire:model="kursus_id" id="kursus_id" class="w-full p-2 border rounded">
                            <option value="">Pilih Kursus</option>
                            @foreach($kursuses as $kursus)
                            <option value="{{ $kursus->id }}">{{ $kursus->nama_kursus }}</option>
                            @endforeach
                        </select>
                        @error('kursus_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="peserta_id" class="block text-gray-700 mb-2">Peserta</label>
                        <select wire:model="peserta_id" id="peserta_id" class="w-full p-2 border rounded">
                            <option value="">Pilih Peserta</option>
                            @foreach($pesertas as $peserta)
                            <option value="{{ $peserta->id }}">{{ $peserta->nama }}</option>
                            @endforeach
                        </select>
                        @error('peserta_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 mb-2">Status</label>
                        <select wire:model="status" id="status" class="w-full p-2 border rounded">
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center space-x-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Simpan
                        </button>
                        <a href="{{ route('pendaftarans.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>