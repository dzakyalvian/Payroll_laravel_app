<div class="max-w-7xl mx-auto">

    <!-- Flash Message -->
    @if(session()->has('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
            <x-ui.icon name="check" class="w-5 h-5" />
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-primary/10 text-primary rounded-lg">
                <x-ui.icon name="history" class="w-6 h-6" />
            </div>
            <h2 class="text-2xl font-bold tracking-tight text-foreground">Riwayat Slip Gaji</h2>
        </div>

        <!-- Dropdown filter periode -->
        <select wire:model.live="filterPeriod" class="rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none py-2 px-3.5 text-sm shadow-sm">
            <option value="" class="bg-card">Semua Periode</option>
            @foreach($periods as $period)
                <option value="{{ $period }}" class="bg-card">{{ $period }}</option>
            @endforeach
        </select>
    </div>

    <x-ui.card class="overflow-x-auto p-0 border border-border">
        <table class="min-w-full divide-y divide-border text-sm">
            <thead>
                <tr class="bg-muted/30 text-left border-b border-border">
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Karyawan</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Periode</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Gaji Pokok</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Tunjangan</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Potongan</th>
                    <th class="px-4 py-2.5 text-xs font-bold text-foreground uppercase tracking-wider">Take Home Pay</th>
                    <th class="px-4 py-2.5 text-xs font-semibold text-muted-foreground uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">

                @forelse($payrolls as $p)
                    <tr class="hover:bg-muted/10 transition-colors border-b border-border last:border-b-0">
                        <td class="px-4 py-2.5 font-semibold text-foreground">{{ $p->employee->name }}</td>
                        <td class="px-4 py-2.5 text-muted-foreground">{{ $p->month_year }}</td>
                        <td class="px-4 py-2.5 text-foreground">Rp {{ number_format($p->basic_salary, 0, ',', '.') }}</td>
                        <td class="px-4 py-2.5 text-emerald-500 font-medium">+Rp {{ number_format($p->allowance, 0, ',', '.') }}</td>
                        <td class="px-4 py-2.5 text-destructive font-medium">-Rp {{ number_format($p->deduction, 0, ',', '.') }}</td>
                        <td class="px-4 py-2.5 font-bold text-primary">Rp {{ number_format($p->net_salary, 0, ',', '.') }}</td>
                        <td class="px-4 py-2.5 text-sm font-medium">
                            <!-- Guard: tombol cetak hanya muncul setelah route payroll.cetak didefinisikan di Tahap 6 -->
                            @if(Route::has('payroll.cetak'))
                                <a href="{{ route('payroll.cetak', $p->id) }}" target="_blank"
                                   class="text-primary hover:underline text-xs font-semibold flex items-center gap-1.5">
                                   <x-ui.icon name="printer" class="w-3.5 h-3.5" />
                                   <span>Cetak PDF</span>
                                </a>
                            @else
                                <span class="text-xs text-muted-foreground/60">PDF (selesaikan Tahap 6)</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-muted-foreground">
                            Belum ada riwayat slip gaji. Silakan input di halaman
                            <a href="{{ route('payroll.calculator') }}" wire:navigate class="text-primary underline font-medium">Kalkulator Payroll</a>.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </x-ui.card>

    <!-- Pagination -->
    <div class="mt-6 border-t border-border pt-4">
        {{ $payrolls->links() }}
    </div>

</div>
