<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Instruktur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Edit Instruktur</h1>

                    <form wire:submit.prevent="update" class="max-w-md">
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 mb-2">Nama Instruktur</label>
                            <input type="text" wire:model="nama" id="nama" class="w-full p-2 border rounded">
                            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" wire:model="email" id="email" class="w-full p-2 border rounded">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Update
                            </button>
                            <a href="{{ route('instrukturs.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>