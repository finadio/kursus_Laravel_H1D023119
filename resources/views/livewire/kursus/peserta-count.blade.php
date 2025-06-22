<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-6">Jumlah Peserta per Kursus</h1>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kursus</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Peserta</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($kursuses as $kursus)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $kursus->nama_kursus }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $kursus->peserta_count }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-center">Tidak ada data kursus</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>