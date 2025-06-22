<div>
    <button wire:click="confirmDelete" class="text-red-500 hover:text-red-600">Hapus</button>

    @if ($confirmingDeletion)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <h2 class="text-xl font-bold mb-4">Konfirmasi Hapus</h2>
                <p class="mb-6">Apakah Anda yakin ingin menghapus pendaftaran ini?</p>
                
                <div class="flex justify-end space-x-4">
                    <button wire:click="$set('confirmingDeletion', false)" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Batal
                    </button>
                    <button wire:click="delete" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>