<div class="max-w-5xl mx-auto py-8 px-4">

    <!-- Flash Message -->
    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">📄 Riwayat Slip Gaji</h2>

        <!-- Dropdown filter periode — wire:model.live agar langsung reaktif -->
        <select wire:model.live="filterPeriod" class="rounded border-gray-300 shadow-sm text-sm">
            <option value="">Semua Periode</option>
            @foreach($periods as $period)
                <option value="{{ $period }}">{{ $period }}</option>
            @endforeach
        </select>
    </div>

    <div class="bg-white rounded-lg shadow border border-gray-100 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="px-4 py-3 text-gray-500">Karyawan</th>
                    <th class="px-4 py-3 text-gray-500">Periode</th>
                    <th class="px-4 py-3 text-gray-500">Gaji Pokok</th>
                    <th class="px-4 py-3 text-gray-500">Tunjangan</th>
                    <th class="px-4 py-3 text-gray-500">Potongan</th>
                    <th class="px-4 py-3 font-semibold text-gray-700">Take Home Pay</th>
                    <th class="px-4 py-3 text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @forelse($payrolls as $p)
                    <tr>
                        <td class="px-4 py-3 font-semibold">{{ $p->employee->name }}</td>
                        <td class="px-4 py-3">{{ $p->month_year }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($p->basic_salary, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-green-600">+Rp {{ number_format($p->allowance, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-red-600">-Rp {{ number_format($p->deduction, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 font-bold text-blue-700">Rp {{ number_format($p->net_salary, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            <!-- Guard: tombol cetak hanya muncul setelah route payroll.cetak didefinisikan di Tahap 6 -->
                            @if(Route::has('payroll.cetak'))
                                <a href="{{ route('payroll.cetak', $p->id) }}" target="_blank"
                                   class="text-indigo-600 hover:underline text-xs font-medium">🖨️ Cetak PDF</a>
                            @else
                                <span class="text-xs text-gray-400">PDF (selesaikan Tahap 6)</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                            Belum ada riwayat slip gaji. Silakan input di halaman
                            <a href="{{ route('payroll.calculator') }}" wire:navigate class="text-blue-600 underline">Kalkulator Payroll</a>.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <!-- Pagination: $payrolls->links() bekerja karena kita pakai paginate(10) di PHP -->
    <div class="mt-4">
        {{ $payrolls->links() }}
    </div>

</div>
