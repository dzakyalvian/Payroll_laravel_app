<div>
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-primary/10 text-primary rounded-lg">
                <x-ui.icon name="dashboard" class="w-6 h-6" />
            </div>
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-foreground">Overview Dashboard</h1>
                <p class="text-sm text-muted-foreground mt-1">Overview of your enterprise payroll and employee metrics.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card: Total Karyawan -->
        <x-ui.stat-card title="Total Karyawan" value="{{ $totalKaryawan }} Orang" icon="users" />

        <!-- Card: Gaji Bulan Ini -->
        <x-ui.stat-card title="Gaji Cair Bulan Ini" value="Rp {{ number_format($totalGaji, 0, ',', '.') }}" icon="banknotes" />

        <!-- Card: Link Cepat -->
        <x-ui.card class="flex flex-col justify-between p-5 border border-border">
            <div>
                <h3 class="text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-4">Akses Cepat</h3>
                <div class="flex flex-col gap-1.5">
                    <a href="{{ route('employee.edit') }}" wire:navigate class="flex items-center justify-between p-2 rounded-lg hover:bg-secondary transition-colors text-sm text-foreground">
                        <span class="font-medium">Manajemen Karyawan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-muted-foreground"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                    <a href="{{ route('payroll.calculator') }}" wire:navigate class="flex items-center justify-between p-2 rounded-lg hover:bg-secondary transition-colors text-sm text-foreground">
                        <span class="font-medium">Input Payroll</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-muted-foreground"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                    <a href="{{ route('payroll.history') }}" wire:navigate class="flex items-center justify-between p-2 rounded-lg hover:bg-secondary transition-colors text-sm text-foreground">
                        <span class="font-medium">Riwayat Penggajian</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-muted-foreground"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                </div>
            </div>
        </x-ui.card>
    </div>
</div>
