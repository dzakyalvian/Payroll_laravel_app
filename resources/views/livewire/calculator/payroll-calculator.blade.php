<div class="max-w-2xl mx-auto">

    <!-- Flash sukses -->
    @if(session()->has('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
            <x-ui.icon name="check" class="w-5 h-5" />
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <x-ui.card class="border border-border">
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2 bg-primary/10 text-primary rounded-lg">
                <x-ui.icon name="calculator" class="w-6 h-6" />
            </div>
            <h2 class="text-xl font-semibold text-foreground">Kalkulator Penggajian</h2>
        </div>

        <form wire:submit="savePayroll">

            <!-- Pilih Karyawan -->
            <div class="mb-5">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Karyawan</label>
                <select wire:model="employee_id" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm">
                    <option value="" class="bg-card">-- Pilih Karyawan --</option>
                    @foreach($employees as $emp)
                        <option value="{{ $emp->id }}" class="bg-card">{{ $emp->nik }} — {{ $emp->name }}</option>
                    @endforeach
                </select>
                @error('employee_id') <span class="text-xs text-destructive mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Periode Gaji -->
            <div class="mb-5">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Periode Gaji</label>
                <input type="text" wire:model="month_year" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm" placeholder="April 2026">
                @error('month_year') <span class="text-xs text-destructive mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Input Nominal -->
            <div class="mb-5">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Gaji Pokok</label>
                <input type="number" wire:model.live="basic_salary" min="0" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm" placeholder="0">
                @error('basic_salary') <span class="text-xs text-destructive mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="mb-5">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Tunjangan</label>
                <input type="number" wire:model.live="allowance" min="0" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm" placeholder="0">
            </div>

            <div class="mb-6">
                <label class="block text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-2">Potongan (BPJS, Pajak, dll)</label>
                <input type="number" wire:model.live="deduction" min="0" class="mt-1 block w-full rounded-lg bg-background border border-border text-foreground focus:border-primary focus:ring-2 focus:ring-primary/10 focus:outline-none p-2.5 text-sm" placeholder="0">
            </div>

            <!-- Take Home Pay Summary -->
            <div class="border-t border-border pt-6 mb-6 flex justify-between items-center">
                <div>
                    <p class="text-sm font-semibold text-muted-foreground">Take Home Pay (THP)</p>
                    <p class="text-xs text-muted-foreground/60 mt-0.5">Gaji Pokok + Tunjangan - Potongan</p>
                </div>
                <div class="text-3xl font-extrabold text-primary">
                    Rp {{ number_format($net_salary, 0, ',', '.') }}
                </div>
            </div>

            <button type="submit"
                wire:loading.attr="disabled"
                class="w-full bg-primary text-primary-foreground font-semibold py-2.5 px-4 rounded-lg shadow-sm hover:bg-primary/90 disabled:opacity-50 transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background flex items-center justify-center gap-2 text-sm">
                <x-ui.icon name="save" class="w-4 h-4" />
                <span wire:loading.remove>Simpan Slip Gaji</span>
                <span wire:loading>Menyimpan...</span>
            </button>

        </form>
    </x-ui.card>
</div>