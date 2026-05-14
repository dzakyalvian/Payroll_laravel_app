<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📊 Overview Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Card: Total Karyawan -->
        <div class="bg-white p-6 rounded-lg shadow border border-gray-100">
            <h3 class="text-gray-500 text-sm">Total Karyawan</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalKaryawan }} Orang</p>
        </div>

        <!-- Card: Gaji Bulan Ini -->
        <div class="bg-white p-6 rounded-lg shadow border border-gray-100">
            <h3 class="text-gray-500 text-sm">Gaji Cair Bulan Ini</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">Rp {{ number_format($totalGaji, 0, ',', '.') }}</p>
        </div>

        <!-- Card: Link Cepat -->
        <div class="bg-white p-6 rounded-lg shadow border border-gray-100">
            <h3 class="text-gray-500 text-sm">Akses Cepat</h3>
            <div class="mt-3 flex flex-col gap-2">
                <a href="{{ route('employee.index') }}" wire:navigate class="text-blue-600 hover:underline text-sm">→ Manajemen Karyawan</a>
                <a href="{{ route('payroll.calculator') }}" wire:navigate class="text-blue-600 hover:underline text-sm">→ Input Payroll</a>
            </div>
        </div>

    </div>
</div>
